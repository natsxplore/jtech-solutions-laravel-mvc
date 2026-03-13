<?php

namespace App\Repositories;

use App\Helpers\IDGenerator;
use App\Models\Store;

class StoreRepository extends BaseRepository
{
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }

    public function findByTenant($tenantId)
    {
        return $this->model->where('tenant_id', $tenantId)->get();
    }

    public function create(array $data)
    {
        if (!isset($data['store_id'])) {
            $data['store_id'] = IDGenerator::generate('STR');
        }
        return parent::create($data);
    }
}
