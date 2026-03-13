<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'jtech_stores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'store_id',
        'tenant_id',
        'tax_id',
        'branch_name',
        'address',
        'city',
        'province',
        'country',
        'zip_code',
        'phone',
        'email',
        'manager_name',
        'is_active',
        'is_main',
        'settings',
        'activated_at',
        'deactivated_at',
    ];

    protected $casts = [
        'settings' => 'array',
        'is_active' => 'boolean',
        'is_main' => 'boolean',
        'activated_at' => 'datetime',
        'deactivated_at' => 'datetime',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'tenant_id');
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'store_id', 'store_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'store_user', 'store_id', 'user_id')
                    ->withPivot(['tenant_id', 'role', 'is_default'])
                    ->withTimestamps();
    }
}
