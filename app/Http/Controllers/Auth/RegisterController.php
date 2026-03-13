<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Services\TenantSetupService;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    protected $tenantSetupService;

    public function __construct(TenantSetupService $tenantSetupService)
    {
        $this->tenantSetupService = $tenantSetupService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $result = $this->tenantSetupService->registerNewTenant($validatedData);

            $trialInfo = 'Your trial ends on ' . $result['subscription']->trial_ends_at->format('M d, Y');

            // Web: redirect to login with success + trial info.
            // JSON: standardized success payload from BaseController.
            $response = $this->respondSuccess(
                $request,
                'Registration successful! Please check your email to verify your account and start your 14-day free trial.',
                'login',
                ['trial_info' => $trialInfo]
            );

            // For web redirects, also attach trial_info to session.
            if (! ($request->wantsJson() || $request->ajax())) {
                $response->with('trial_info', $trialInfo);
            }

            return $response;

        } catch (\Exception $e) {
            $message = 'Registration failed. Please try again. ' . $e->getMessage();

            return $this->respondError(
                $request,
                $message,
                500,
                [],
                null,
                $request->except('password')
            );
        }
    }
}
