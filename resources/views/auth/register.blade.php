@extends('layouts.guest')

@section('title', 'Register | ' . config('app.name', 'JTech Solution'))

@section('content')
<main class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex flex-col items-center">
    <div class="w-full max-w-2xl">
            <div class="bg-white rounded-xl border border-gray-200 shadow-lg p-8">
                <div class="space-y-1 mb-8">
                    <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600">Get started</p>
                    <h1 class="text-2xl font-bold text-gray-900">Create your account</h1>
                    <p class="text-sm text-gray-600">
                        Set up a new account to access your dashboard.
                    </p>
                </div>

                <form id="registerForm" class="space-y-5" enctype="multipart/form-data" data-url="{{ route('auth.register') }}">
                    {{-- Personal information --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="space-y-1">
                            <label for="first_name" class="block text-sm font-medium text-gray-900">First name</label>
                            <input
                                id="first_name"
                                name="first_name"
                                type="text"
                                value="{{ old('first_name') }}"
                                autocomplete="given-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-first_name text-red-500 text-xs mt-1"></span>
                        </div>
                        <div class="space-y-1">
                            <label for="middle_name" class="block text-sm font-medium text-gray-900">Middle name</label>
                            <input
                                id="middle_name"
                                name="middle_name"
                                type="text"
                                value="{{ old('middle_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-middle_name text-red-500 text-xs mt-1"></span>
                        </div>
                        <div class="space-y-1">
                            <label for="last_name" class="block text-sm font-medium text-gray-900">Last name</label>
                            <input
                                id="last_name"
                                name="last_name"
                                type="text"
                                value="{{ old('last_name') }}"
                                autocomplete="family-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-last_name text-red-500 text-xs mt-1"></span>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <span class="error-text error-email text-red-500 text-xs mt-1"></span>
                    </div>

                    {{-- Tenant/company info --}}
                    <div class="space-y-1">
                        <label for="company_name" class="block text-sm font-medium text-gray-900">Company name</label>
                        <input
                            id="company_name"
                            name="company_name"
                            type="text"
                            value="{{ old('company_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <span class="error-text error-company_name text-red-500 text-xs mt-1"></span>
                    </div>

                    <div class="space-y-1">
                        <label for="subdomain" class="block text-sm font-medium text-gray-900">Company identifier <span class="text-gray-400 font-normal">(optional)</span></label>
                        <input
                            id="subdomain"
                            name="subdomain"
                            type="text"
                            value="{{ old('subdomain') }}"
                            placeholder="e.g. mycompany — used for login"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <p class="text-xs text-gray-500">Letters, numbers, and hyphens only. Leave blank to auto-generate from company name.</p>
                        <span class="error-text error-subdomain text-red-500 text-xs mt-1"></span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="phone" class="block text-sm font-medium text-gray-900">Phone</label>
                            <input
                                id="phone"
                                name="phone"
                                type="text"
                                value="{{ old('phone') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-phone text-red-500 text-xs mt-1"></span>
                        </div>
                        <div class="space-y-1">
                            <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                            <input
                                id="address"
                                name="address"
                                type="text"
                                value="{{ old('address') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-address text-red-500 text-xs mt-1"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="space-y-1">
                            <label for="city" class="block text-sm font-medium text-gray-900">City</label>
                            <input
                                id="city"
                                name="city"
                                type="text"
                                value="{{ old('city') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-city text-red-500 text-xs mt-1"></span>
                        </div>
                        <div class="space-y-1">
                            <label for="province" class="block text-sm font-medium text-gray-900">Province</label>
                            <input
                                id="province"
                                name="province"
                                type="text"
                                value="{{ old('province') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-province text-red-500 text-xs mt-1"></span>
                        </div>
                        <div class="space-y-1">
                            <label for="country" class="block text-sm font-medium text-gray-900">Country</label>
                            <input
                                id="country"
                                name="country"
                                type="text"
                                value="{{ old('country', 'Philippines') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                            >
                            <span class="error-text error-country text-red-500 text-xs mt-1"></span>
                        </div>
                    </div>

                    {{-- Password fields --}}
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="new-password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <span class="error-text error-password text-red-500 text-xs mt-1"></span>
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirm password</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            autocomplete="new-password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        >
                        <span class="error-text error-password_confirmation text-red-500 text-xs mt-1"></span>
                    </div>

                    <x-button type="submit" variant="primary" class="w-full justify-center rounded-md px-5 py-2.5">
                        Create account
                    </x-button>
                </form>

                <p class="mt-6 text-sm text-gray-600 text-center">
                    Already registered?
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-700">
                        Sign in
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
