@extends('layouts.guest')

@section('title', 'Login | ' . config('app.name', 'JTech Solution'))

@section('content')
    <div class="space-y-6">
        <div class="space-y-1">
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500">Sign in</p>
            <h2 class="text-2xl font-bold text-gray-900">Welcome back</h2>
            <p class="text-sm text-gray-600">
                Use your email and password to access the dashboard.
            </p>
        </div>

        <form id="loginForm" class="space-y-4" data-url="{{ route('auth.login') }}">
            @csrf
            <div class="space-y-1">
                <label for="subdomain" class="block mb-1 text-sm font-medium text-gray-900">Company / subdomain <span class="text-gray-400 font-normal">(optional)</span></label>
                <input
                    id="subdomain"
                    name="subdomain"
                    type="text"
                    value="{{ old('subdomain') }}"
                    placeholder="e.g. acme"
                    autocomplete="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
                <p class="text-xs text-gray-500">Use when you have multiple accounts with the same email.</p>
            </div>

            <div class="space-y-1">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Email address</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
            </div>

            <div class="space-y-1">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
            </div>

            <div class="flex items-center justify-between text-xs text-gray-600">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span>Remember me</span>
                </label>
                <a href="#" class="text-indigo-600 hover:text-indigo-700">Forgot password?</a>
            </div>

            <x-button type="submit" variant="primary" class="w-full justify-center">
                Sign in
            </x-button>
        </form>

        <p class="text-xs text-gray-600">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                Create one
            </a>
        </p>

        <a href="{{ route('landing') }}" class="inline-flex items-center text-xs text-gray-500 hover:text-gray-700">
            ← Back to landing
        </a>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/pages/register.js'])
@endpush

