<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'jtech_plans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'plan_id',
        'plan_name',
        'slug',
        'plan_description',
        'price_monthly',
        'price_yearly',
        'max_branches',
        'max_warehouses',
        'max_users',
        'max_products',
        'has_multi_store',
        'has_multi_warehouse',
        'has_advanced_reporting',
        'has_inventory_alerts',
        'has_barcode_scanner',
        'trial_days',
        'is_popular',
        'is_active',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
        'has_multi_store' => 'boolean',
        'has_multi_warehouse' => 'boolean',
        'has_advanced_reporting' => 'boolean',
        'has_inventory_alerts' => 'boolean',
        'has_barcode_scanner' => 'boolean',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id', 'plan_id');
    }
}
