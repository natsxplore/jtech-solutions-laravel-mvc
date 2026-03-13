<?php

namespace App\Repositories;

use App\Helpers\IDGenerator;
use App\Models\Warehouse;

class WarehouseRepository extends BaseRepository
{
    public function __construct(Warehouse $model)
    {
        parent::__construct($model);
    }

    public function findByTenant($tenantId)
    {
        return $this->model->where('tenant_id', $tenantId)->get();
    }

    public function findByStore($storeId)
    {
        return $this->model->where('store_id', $storeId)->get();
    }

    public function create(array $data)
    {
        if (!isset($data['warehouse_id'])) {
            $data['warehouse_id'] = IDGenerator::generate('WHS');
        }

        return parent::create($data);
    }
}
