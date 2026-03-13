<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    protected $userRepository;

    protected $tenantRepository;

    public function __construct(UserRepository $userRepository, TenantRepository $tenantRepository)
    {
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function authenticate(string $email, string $password, bool $remember = false, ?string $subdomain = null)
    {
        $tenantId = null;
        if ($subdomain) {
            $tenant = $this->tenantRepository->findBySubdomain($subdomain);
            if (! $tenant) {
                throw new \Exception('Invalid company or subdomain.');
            }
            $tenantId = $tenant->tenant_id;
        }

        $user = $this->userRepository->findByEmail($email, $tenantId);

        if (! $user || ! Hash::check($password, $user->password)) {
            throw new \Exception('Invalid credentials.');
        }

        if (! $user->is_active) {
            throw new \Exception('Account is inactive.');
        }

        if (method_exists($user, 'hasVerifiedEmail') && ! $user->hasVerifiedEmail()) {
            throw new \Exception('Please verify your email address first.');
        }

        return $user;
    }
}
