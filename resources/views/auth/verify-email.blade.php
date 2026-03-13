@extends('layouts.guest')

@section('title', 'Verify Email | ' . config('app.name', 'JTech Solution'))

@section('content')
    <div class="space-y-6">
        <div class="space-y-1">
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500">Email verification</p>
            <h2 class="text-2xl font-bold text-gray-900">Verify your email</h2>
            <p class="text-sm text-gray-600">
                Thanks for signing up. We’ve sent a verification link to your email address. Click the link to verify your account, then you can sign in.
            </p>
        </div>

        @if (session('status') === 'verification-link-sent')
            <div class="rounded-lg bg-green-50 p-3 text-sm text-green-800">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <div class="space-y-3">
            <p class="text-sm text-gray-600">
                Didn’t receive the email? You can request another verification link.
            </p>
            <form method="POST" action="{{ route('verification.send') }}" class="inline">
                @csrf
                <x-button type="submit" variant="primary">
                    Resend verification email
                </x-button>
            </form>
        </div>

        <p class="text-xs text-gray-600">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Back to login</a>
        </p>
    </div>
@endsection
