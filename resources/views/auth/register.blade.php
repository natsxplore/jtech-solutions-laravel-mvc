@extends('layouts.guest')

@section('title', 'Register | ' . config('app.name', 'JTech Solution'))

@section('content')
    <div class="space-y-6">
        <div class="space-y-1">
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500">Get started</p>
            <h2 class="text-2xl font-bold text-gray-900">Create your account</h2>
            <p class="text-sm text-gray-600">
                Set up a new account to access your dashboard.
            </p>
        </div>


        <form id="registerForm" class="space-y-4" enctype="multipart/form-data" data-url="{{ route('auth.register') }}">
            {{-- personal information --}}
            <div class="grid grid-cols-3 gap-4">
                <div class="space-y-1">
                    <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900">First name</label>
                    <input
                        id="first_name"
                        name="first_name"
                        type="text"
                        value="{{ old('first_name') }}"
                        autocomplete="given-name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-first_name text-red-500 text-xs mt-1"></span>
                </div>

                <div class="space-y-1">
                    <label for="middle_name" class="block mb-1 text-sm font-medium text-gray-900">Middle name</label>
                    <input
                        id="middle_name"
                        name="middle_name"
                        type="text"
                        value="{{ old('middle_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-middle_name text-red-500 text-xs mt-1"></span>
                </div>

                <div class="space-y-1">
                    <label for="last_name" class="block mb-1 text-sm font-medium text-gray-900">Last name</label>
                    <input
                        id="last_name"
                        name="last_name"
                        type="text"
                        value="{{ old('last_name') }}"
                        autocomplete="family-name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-last_name text-red-500 text-xs mt-1"></span>
                </div>
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
                <span class="error-text error-email text-red-500 text-xs mt-1"></span>
            </div>

            {{-- fetch active plans so user can choose a subscription --}}
            {{-- @php
                $plans = \App\Models\Plan::where('is_active', true)->orderBy('sort_order')->get();
            @endphp

            @if($plans->count())
                <div class="space-y-1">
                    <label for="plan_id" class="block mb-1 text-sm font-medium text-gray-900">Choose plan</label>
                    <select
                        id="plan_id"
                        name="plan_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                        <option value="">-- default --</option>
                        @foreach($plans as $plan)
                            <option value="{{ $plan->plan_id }}" {{ old('plan_id') == $plan->plan_id ? 'selected' : '' }}>
                                {{ $plan->name }} ({{ number_format($plan->price_monthly,2) }})
                            </option>
                        @endforeach
                    </select>
                    <span class="error-text error-plan_id text-red-500 text-xs mt-1"></span>
                </div>
            @endif --}}

            {{-- tenant/company info --}}
            <div class="space-y-1">
                <label for="company_name" class="block mb-1 text-sm font-medium text-gray-900">Company name</label>
                <input
                    id="company_name"
                    name="company_name"
                    type="text"
                    value="{{ old('company_name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
                <span class="error-text error-company_name text-red-500 text-xs mt-1"></span>
            </div>

            <div class="space-y-1">
                <label for="subdomain" class="block mb-1 text-sm font-medium text-gray-900">Company identifier <span class="text-gray-400 font-normal">(optional)</span></label>
                <input
                    id="subdomain"
                    name="subdomain"
                    type="text"
                    value="{{ old('subdomain') }}"
                    placeholder="e.g. mycompany — used for login"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
                <p class="text-xs text-gray-500">Letters, numbers, and hyphens only. Leave blank to auto-generate from company name.</p>
                <span class="error-text error-subdomain text-red-500 text-xs mt-1"></span>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label for="phone" class="block mb-1 text-sm font-medium text-gray-900">Phone</label>
                    <input
                        id="phone"
                        name="phone"
                        type="text"
                        value="{{ old('phone') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-phone text-red-500 text-xs mt-1"></span>
                </div>

                <div class="space-y-1">
                    <label for="address" class="block mb-1 text-sm font-medium text-gray-900">Address</label>
                    <input
                        id="address"
                        name="address"
                        type="text"
                        value="{{ old('address') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-address text-red-500 text-xs mt-1"></span>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="space-y-1">
                    <label for="city" class="block mb-1 text-sm font-medium text-gray-900">City</label>
                    <input
                        id="city"
                        name="city"
                        type="text"
                        value="{{ old('city') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-city text-red-500 text-xs mt-1"></span>
                </div>

                <div class="space-y-1">
                    <label for="province" class="block mb-1 text-sm font-medium text-gray-900">Province</label>
                    <input
                        id="province"
                        name="province"
                        type="text"
                        value="{{ old('province') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-province text-red-500 text-xs mt-1"></span>
                </div>

                <div class="space-y-1">
                    <label for="country" class="block mb-1 text-sm font-medium text-gray-900">Country</label>
                    <input
                        id="country"
                        name="country"
                        type="text"
                        value="{{ old('country', 'Philippines') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    >
                    <span class="error-text error-country text-red-500 text-xs mt-1"></span>
                </div>
            </div>

            {{-- password fields --}}
            <div class="space-y-1">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
                <span class="error-text error-password text-red-500 text-xs mt-1"></span>
            </div>

            <div class="space-y-1">
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-900">Confirm password</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                >
                <span class="error-text error-password_confirmation text-red-500 text-xs mt-1"></span>
            </div>

            <x-button type="submit" variant="primary" class="w-full justify-center">
                Create account
            </x-button>
        </form>

        <p class="text-xs text-gray-600">
            Already registered?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                Sign in
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
