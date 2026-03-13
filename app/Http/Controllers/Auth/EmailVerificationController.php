<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    /**
     * Show the email verification notice (e.g. for guests who haven’t verified).
     */
    public function notice(Request $request): View
    {
        return view('auth.verify-email');
    }

    /**
     * Verify the email from the link (no login required).
     * Route name must be 'verification.verify' for Laravel’s VerifyEmail notification.
     */
    public function verify(Request $request): RedirectResponse
    {
        $user = User::find($request->route('id'));

        if (! $user) {
            return redirect()->route('login')
                ->with('error', 'Invalid verification link.');
        }

        if (! hash_equals(
            (string) $request->route('hash'),
            sha1($user->getEmailForVerification())
        )) {
            return redirect()->route('login')
                ->with('error', 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')
                ->with('success', 'Email is already verified. You can log in.');
        }

        $user->markEmailAsVerified();
        event(new Verified($user));

        return redirect()->route('login')
            ->with('success', 'Email verified. You can now log in.');
    }

    /**
     * Resend the verification email. Requires the user to be logged in.
     */
    public function resend(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent. Please check your email.');
    }
}
