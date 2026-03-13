<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use App\Helpers\IDGenerator;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail($email, $tenantId = null)
    {
        $query = $this->model->where('email', $email);

        if ($tenantId) {
            $query->where('tenant_id', $tenantId);
        }

        return $query->first();
    }

    public function findTenantUsers($tenantId)
    {
        return $this->findAllBy('tenant_id', $tenantId);
    }

    public function create(array $data)
    {
        if (!isset($data['user_id'])) {
            $data['user_id'] = IDGenerator::generate('USR');
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return parent::create($data);
    }
}
