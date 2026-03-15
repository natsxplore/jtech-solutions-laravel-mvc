@extends('layouts.guest')

@section('title', 'Login | ' . config('app.name', 'JTech Solution'))

@section('content')
<main class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl border border-gray-200 shadow-lg p-8">
                <div class="space-y-1 mb-8">
                    <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600">Sign in</p>
                    <h1 class="text-2xl font-bold text-gray-900">Welcome back</h1>
                    <p class="text-sm text-gray-600">
                        Use your email and password to access the dashboard.
                    </p>
                </div>

                <form id="loginForm" class="space-y-4" data-url="{{ route('auth.login') }}">
                    @csrf
                    <div class="space-y-1">
                        <label for="subdomain" class="block text-sm font-medium text-gray-900">Company / subdomain <span class="text-gray-400 font-normal">(optional)</span></label>
                        <input
                            id="subdomain"
                            name="subdomain"
                            type="text"
                            value="{{ old('subdomain') }}"
                            placeholder="e.g. acme"
                            autocomplete="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <p class="text-xs text-gray-500">Use when you have multiple accounts with the same email.</p>
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                    </div>

                    <div class="flex items-center justify-between text-xs text-gray-600">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Forgot password?</a>
                    </div>

                    <x-button type="submit" variant="primary" class="w-full justify-center rounded-lg px-5 py-2.5">
                        Sign in
                    </x-button>
                </form>

                <p class="mt-6 text-sm text-gray-600 text-center">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700">
                        Create one
                    </a>
                </p>
        </div>
        <a href="{{ route('landing') }}" class="mt-6 flex items-center justify-center gap-1 text-sm text-gray-500 hover:text-gray-700 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to landing
        </a>
    </div>
</main>
@endsection

@push('scripts')
    @vite(['resources/js/pages/register.js'])
@endpush
