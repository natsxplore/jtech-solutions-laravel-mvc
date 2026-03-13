<?php

namespace App\Services;

use App\Models\User;

class DashboardService
{
    public function getDashboardData(User $user): array
    {
        $tenant = $user->tenant;
        $subscription = $tenant?->subscription;
        $plan = $subscription?->plan;

        $stats = null;
        if ($tenant && $plan) {
            $stats = [
                'branches' => [
                    'count' => $tenant->stores()->count(),
                    'limit' => $plan->max_branches,
                ],
                'warehouses' => [
                    'count' => $tenant->warehouses()->count(),
                    'limit' => $plan->max_warehouses,
                ],
                'users' => [
                    'count' => $tenant->users()->count(),
                    'limit' => $plan->max_users,
                ],
            ];
        }

        return [
            'user' => $user,
            'tenant' => $tenant,
            'subscription' => $subscription,
            'plan' => $plan,
            'stats' => $stats,
        ];
    }
}

