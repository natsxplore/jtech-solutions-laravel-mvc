<?php
namespace App\Repositories;

use App\Models\Tenant;
use App\Models\User;
use App\Helpers\IDGenerator;
use Illuminate\Support\Facades\Hash;

class TenantRepository extends BaseRepository
{
    public function __construct(Tenant $model)
    {
        parent::__construct($model);
    }

    public function findByEmail($email)
    {
        return $this->findBy('email', $email);
    }

    public function findBySubdomain($subdomain)
    {
        return $this->findBy('subdomain', $subdomain);
    }

    public function getByTenantId(string $tenantId)
    {
        return $this->findBy('tenant_id', $tenantId);
    }

    public function createWithUser(array $tenantData, array $userData)
    {
        try {
            $this->beginTransaction();

            $tenantData['tenant_id'] = IDGenerator::generate('TEN');
            $tenantData['status'] = 'trial';
            $tenantData['trial_ends_at'] = now()->addDays(14);

            $tenant = $this->create($tenantData);

            $userData['user_id'] = IDGenerator::generate('USR');
            $userData['tenant_id'] = $tenant->tenant_id;
            $userData['password'] = Hash::make($userData['password']);
            $userData['user_role'] = 'admin'; // first user is admin

            $user = User::create($userData);

            $this->commit();

            return [
                'tenant' => $tenant,
                'user' => $user
            ];

        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    public function updateStatus($tenantId, $status)
    {
        return $this->update($tenantId, ['status' => $status]);
    }
}
