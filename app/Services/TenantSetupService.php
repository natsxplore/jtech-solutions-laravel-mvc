<?php
namespace App\Services;

use App\Repositories\TenantRepository;
use App\Repositories\UserRepository;
use App\Repositories\PlanRepository;
use App\Services\SubscriptionService;
use App\Helpers\IDGenerator;
use App\Repositories\StoreRepository;
use App\Repositories\WarehouseRepository;

class TenantSetupService
{
    protected $tenantRepository;
    protected $userRepository;
    protected $planRepository;
    protected $subscriptionService;
    protected $storeRepository;
    protected $warehouseRepository;

    public function __construct(
        TenantRepository $tenantRepository,
        UserRepository $userRepository,
        PlanRepository $planRepository,
        SubscriptionService $subscriptionService,
        StoreRepository $storeRepository,
        WarehouseRepository $warehouseRepository
    ) {
        $this->tenantRepository = $tenantRepository;
        $this->userRepository = $userRepository;
        $this->planRepository = $planRepository;
        $this->subscriptionService = $subscriptionService;
        $this->storeRepository = $storeRepository;
        $this->warehouseRepository = $warehouseRepository;
    }

    public function registerNewTenant(array $data)
    {
        try {
            $this->tenantRepository->beginTransaction();

            $subdomain = $this->generateSubdomain($data['company_name'], $data['subdomain'] ?? null);

            $tenantData = [
                'company_name' => $data['company_name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'subdomain' => $subdomain,
                'address' => $data['address'] ?? null,
                'city' => $data['city'] ?? null,
                'province' => $data['province'] ?? null,
                'country' => $data['country'] ?? 'Philippines',
                'zip_code' => $data['zip_code'] ?? null,
            ];

            $userData = [
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'] ?? null,
                'last_name' => $data['last_name'],
                'name' => trim($data['first_name'] . ' ' . ($data['middle_name'] ?? '') . ' ' . $data['last_name']),
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            $result = $this->tenantRepository->createWithUser($tenantData, $userData);

            $tenant = $result['tenant'];
            $user = $result['user'];

            $planId = $data['plan_id'] ?? null;

            if (! $planId) {
                $defaultPlan = $this->planRepository->getDefaultPlan();
                if (! $defaultPlan) {
                    throw new \RuntimeException('No subscription plan available. Please contact support.');
                }
                $planId = $defaultPlan->plan_id;
            }

            $subscription = $this->subscriptionService->startTrial(
                $tenant->tenant_id,
                $planId,
                $data['trial_days'] ?? null
            );

            $store = $this->createHeadOfficeStore($tenant, $data);

            $warehouse = $this->createPrimaryWarehouse($tenant, $store, $data);

            // Link user to store (required for plan limits and store-scoped access)
            $user->stores()->attach($store->id, [
                'tenant_id' => $tenant->tenant_id,
                'role' => 'admin',
                'is_default' => true,
            ]);

            $this->tenantRepository->commit();

            // Send email verification; user must verify before they can log in
            $user->sendEmailVerificationNotification();

            return [
                'tenant' => $tenant,
                'user' => $user,
                'subscription' => $subscription,
                'store' => $store,
                'warehouse' => $warehouse
            ];

        } catch (\Exception $e) {
            $this->tenantRepository->rollBack();
            throw $e;
        }
    }

    protected function generateSubdomain(?string $companyName, ?string $requested = null): string
    {
        $base = $requested
            ? strtolower(preg_replace('/[^a-z0-9]/', '', $requested))
            : strtolower(preg_replace('/[^a-z0-9]/', '', $companyName ?? ''));
        $subdomain = substr($base ?: 'tenant', 0, 63);

        $original = $subdomain;
        $count = 1;

        while ($this->tenantRepository->findBySubdomain($subdomain)) {
            $subdomain = $original . (string) $count;
            $count++;
        }

        return $subdomain;
    }

    protected function createHeadOfficeStore($tenant, $data)
    {
        $storeData = [
            'store_id' => IDGenerator::generate('STR'),
            'tenant_id' => $tenant->tenant_id,
            'branch_name' => $data['company_name'] . ' Head Office',
            'address' => $data['address'] ?? 'To be set',
            'city' => $data['city'] ?? 'To be set',
            'province' => $data['province'] ?? null,
            'country' => $data['country'] ?? 'Philippines',
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'],
            'manager_name' => $data['first_name'] . ' ' . $data['last_name'],
            'is_main' => true,
            'is_active' => true,
            'settings' => [],
        ];

        return $this->storeRepository->create($storeData);
    }

    protected function createPrimaryWarehouse($tenant, $store, $data)
    {
        $warehouseData = [
            'warehouse_id' => IDGenerator::generate('WHS'),
            'tenant_id' => $tenant->tenant_id,
            'store_id' => $store->store_id,
            'warehouse_name' => 'Main Warehouse',
            'warehouse_description' => null,
            'address' => $data['address'] ?? null,
            'city' => $data['city'] ?? null,
            'province' => $data['province'] ?? null,
            'is_main' => true,
            'is_active' => true,
        ];

        return $this->warehouseRepository->create($warehouseData);
    }
}
