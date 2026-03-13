<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'jtech_tenants';

    protected $fillable = [
        'tenant_id',
        'company_name',
        'address',
        'city',
        'province',
        'country',
        'zip_code',
        'email',
        'phone',
        'subdomain',
        'status',
        'trial_ends_at',
        'settings',
    ];

    protected $casts = [
        'trial_ends_at' => 'datetime',
        'settings' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'tenant_id', 'tenant_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'tenant_id', 'tenant_id')
            ->whereIn('status', ['trial', 'active'])
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>', now());
            })
            ->latest('ends_at');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'tenant_id', 'tenant_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'tenant_id', 'tenant_id');
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'tenant_id', 'tenant_id');
    }

    public function isOnTrial(): bool
    {
        return $this->status === 'trial' && $this->trial_ends_at?->isFuture();
    }

    public function isActive(): bool
    {
        if (! in_array($this->status, ['trial', 'active'])) {
            return false;
        }
        $sub = $this->subscription;
        if ($sub) {
            return $sub->status !== 'expired' && $sub->status !== 'cancelled'
                && ($sub->ends_at === null || $sub->ends_at->isFuture());
        }
        return $this->isOnTrial();
    }
}
