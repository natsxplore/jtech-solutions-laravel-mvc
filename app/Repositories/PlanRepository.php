<?php
// app/Repositories/PlanRepository.php

namespace App\Repositories;

use App\Models\Plan;

class PlanRepository extends BaseRepository
{
    public function __construct(Plan $model)
    {
        parent::__construct($model);
    }

    public function findBySlug($slug)
    {
        return $this->findBy('slug', $slug);
    }

    public function getActivePlans()
    {
        return $this->model->where('is_active', true)
                            ->get();
    }

    public function getDefaultPlan()
    {
        return $this->model->where('is_active', true)
                            ->orderBy('price_monthly')
                            ->first();
    }
}
