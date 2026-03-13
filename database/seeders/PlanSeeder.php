<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Plans: 14-day trial (limited), Basic, Advanced, Custom (for future).
     */
    public function run(): void
    {
        $plans = [
            [
                'plan_id'          => 'trial',
                'plan_name'        => '14-Day Trial',
                'slug'             => 'trial',
                'plan_description' => 'Try the system for 14 days with limited access. 1 user, single branch/store, single warehouse.',
                'price_monthly'    => 0,
                'price_yearly'     => 0,
                'max_branches'     => 1,
                'max_warehouses'   => 1,
                'max_users'        => 1,
                'max_products'     => 100,
                'has_multi_store'  => false,
                'has_multi_warehouse' => false,
                'has_advanced_reporting' => false,
                'has_inventory_alerts'   => false,
                'has_barcode_scanner'    => true,
                'trial_days'       => 14,
                'is_popular'       => false,
                'is_active'        => true,
                'permissions'      => ['pos' => true, 'inventory' => true, 'sales' => true],
            ],
            [
                'plan_id'          => 'basic',
                'plan_name'        => 'Basic',
                'slug'             => 'basic',
                'plan_description' => '1 user, single branch/store, single warehouse. Ideal for small businesses.',
                'price_monthly'    => 499,
                'price_yearly'     => 4990,
                'max_branches'     => 1,
                'max_warehouses'   => 1,
                'max_users'        => 1,
                'max_products'     => 500,
                'has_multi_store'  => false,
                'has_multi_warehouse' => false,
                'has_advanced_reporting' => false,
                'has_inventory_alerts'   => true,
                'has_barcode_scanner'    => true,
                'trial_days'       => 0,
                'is_popular'       => false,
                'is_active'        => true,
                'permissions'      => ['pos' => true, 'inventory' => true, 'sales' => true],
            ],
            [
                'plan_id'          => 'advanced',
                'plan_name'        => 'Advanced',
                'slug'             => 'advanced',
                'plan_description' => 'Multiple branches/stores and warehouses with limited users. Full features including advanced reporting.',
                'price_monthly'    => 1499,
                'price_yearly'     => 14990,
                'max_branches'     => 10,
                'max_warehouses'   => 10,
                'max_users'        => 10,
                'max_products'     => null,
                'has_multi_store'  => true,
                'has_multi_warehouse' => true,
                'has_advanced_reporting' => true,
                'has_inventory_alerts'   => true,
                'has_barcode_scanner'    => true,
                'trial_days'       => 14,
                'is_popular'       => true,
                'is_active'        => true,
                'permissions'      => ['pos' => true, 'inventory' => true, 'sales' => true, 'multi_branch' => true, 'reports' => true],
            ],
            [
                'plan_id'          => 'custom',
                'plan_name'        => 'Custom',
                'slug'             => 'custom',
                'plan_description' => 'Custom plan for enterprise. Contact us for pricing and limits.',
                'price_monthly'    => 0,
                'price_yearly'     => 0,
                'max_branches'     => null,
                'max_warehouses'   => null,
                'max_users'        => null,
                'max_products'     => null,
                'has_multi_store'  => true,
                'has_multi_warehouse' => true,
                'has_advanced_reporting' => true,
                'has_inventory_alerts'   => true,
                'has_barcode_scanner'    => true,
                'trial_days'       => 0,
                'is_popular'       => false,
                'is_active'        => true,
                'permissions'      => null,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['plan_id' => $plan['plan_id']],
                $plan
            );
        }
    }
}
