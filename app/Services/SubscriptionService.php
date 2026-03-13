<?php
// app/Services/SubscriptionService.php

namespace App\Services;

use App\Interfaces\SubscriptionServiceInterface;
use App\Repositories\TenantRepository;
use App\Repositories\PlanRepository;
use App\Models\Subscription;
use App\Helpers\IDGenerator;

class SubscriptionService
{
    protected $tenantRepository;
    protected $planRepository;

    public function __construct(
        TenantRepository $tenantRepository,
        PlanRepository $planRepository
    ) {
        $this->tenantRepository = $tenantRepository;
        $this->planRepository = $planRepository;
    }

    public function startTrial($tenantId, $planId, $days = null)
    {
        $plan = $this->planRepository->findBy('plan_id', $planId);
        $trialDays = $days ?? $plan->trial_days ?? 14;

        return $this->createSubscription(
            $tenantId,
            $planId,
            'monthly',
            'trial',
            $trialDays
        );
    }

    public function createSubscription($tenantId, $planId, $billingCycle = 'monthly', $status = 'trial', $trialDays = null)
    {
        $plan = $this->planRepository->findBy('plan_id', $planId);

        $subscriptionData = [
            'subscription_id' => IDGenerator::generate('SUB'),
            'tenant_id' => $tenantId,
            'plan_id' => $planId,
            'status' => $status,
            'billing_cycle' => $billingCycle,
            'starts_at' => now(),
        ];

        if ($status === 'trial') {
            $trialEnds = now()->addDays($trialDays ?? $plan->trial_days ?? 14);
            $subscriptionData['trial_ends_at'] = $trialEnds;
            $subscriptionData['ends_at'] = $trialEnds;
        } else {
            $subscriptionData['ends_at'] = $billingCycle === 'monthly'
                ? now()->addMonth()
                : now()->addYear();
        }

        return Subscription::create($subscriptionData);
    }

    public function getCurrentSubscription($tenantId)
    {
        return Subscription::where('tenant_id', $tenantId)
                          ->whereIn('status', ['trial', 'active'])
                          ->where(function($query) {
                              $query->whereNull('ends_at')
                                    ->orWhere('ends_at', '>', now());
                          })
                          ->latest()
                          ->first();
    }

    public function canCreateStore($tenantId)
    {
        $subscription = $this->getCurrentSubscription($tenantId);

        if (! $subscription) {
            return false;
        }

        $plan = $subscription->plan;
        if (is_null($plan->max_branches)) {
            return true; // Unlimited
        }

        $tenant = $this->tenantRepository->getByTenantId($tenantId);
        if (! $tenant) {
            return false;
        }

        return $tenant->stores()->count() < $plan->max_branches;
    }

    public function canCreateWarehouse($tenantId)
    {
        $subscription = $this->getCurrentSubscription($tenantId);

        if (! $subscription) {
            return false;
        }

        $plan = $subscription->plan;
        if (is_null($plan->max_warehouses)) {
            return true; // Unlimited
        }

        $tenant = $this->tenantRepository->getByTenantId($tenantId);
        if (! $tenant) {
            return false;
        }

        return $tenant->warehouses()->count() < $plan->max_warehouses;
    }

    public function canAddUser(string $tenantId): bool
    {
        $subscription = $this->getCurrentSubscription($tenantId);

        if (! $subscription) {
            return false;
        }

        $plan = $subscription->plan;
        if (is_null($plan->max_users)) {
            return true; // Unlimited
        }

        $tenant = $this->tenantRepository->getByTenantId($tenantId);
        if (! $tenant) {
            return false;
        }

        return $tenant->users()->count() < $plan->max_users;
    }

    public function hasFeature($tenantId, $feature)
    {
        $subscription = $this->getCurrentSubscription($tenantId);

        if (!$subscription) {
            return false;
        }

        $plan = $subscription->plan;

        if (property_exists($plan, $feature)) {
            return (bool) $plan->$feature;
        }

        $permissions = json_decode($plan->permissions, true) ?? [];
        return $permissions[$feature] ?? false;
    }
}
