<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    protected $authService;

    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            $remember = $data['remember'] ?? false;

            $subdomain = $data['subdomain'] ?? null;
            $user = $this->authService->authenticate(
                $data['email'],
                $data['password'],
                $remember,
                $subdomain
            );

            auth()->login($user, $remember);

            $store = $user->stores()->wherePivot('is_default', true)->first() ?? $user->stores()->first();
            if ($store) {
                session([
                    'current_store_id' => $store->store_id,
                    'current_store_name' => $store->branch_name,
                ]);
            }
            if ($user->tenant_id) {
                session(['tenant_id' => $user->tenant_id]);
            }

            return $this->respondSuccess(
                $request,
                'Welcome back, ' . ($user->first_name ?? $user->name) . '!',
                'dashboard',
                ['redirect' => route('dashboard')]
            );

        } catch (\Exception $e) {
            $message = $e->getMessage();

            return $this->respondError(
                $request,
                $message,
                422,
                [],
                null,
                $request->only('email')
            );
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->withHeaders([
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }
}
