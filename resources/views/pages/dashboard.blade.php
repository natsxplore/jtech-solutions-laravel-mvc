@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Overview for logged-in user --}}
    <div class="bg-white rounded-lg shadow p-4 md:p-6 border border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500">Welcome back</p>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">
                    {{ $user?->first_name ? $user->first_name . ' ' . $user->last_name : $user?->name }}
                </h2>
                @if($tenant)
                    <p class="text-sm text-gray-600 mt-1">
                        Company: <span class="font-medium text-gray-900">{{ $tenant->company_name }}</span>
                        @if($currentStoreName)
                            • Current store: <span class="font-medium text-gray-900">{{ $currentStoreName }}</span>
                        @endif
                    </p>
                @endif
            </div>

            @if($plan)
                <div class="text-sm text-right space-y-1">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Subscription</p>
                    <p class="text-base font-semibold text-gray-900">
                        {{ $plan->plan_name }}
                        <span class="ml-1 inline-flex items-center rounded-full bg-indigo-50 px-2 py-0.5 text-[11px] font-medium text-indigo-700">
                            {{ strtoupper($subscription->status) }}
                        </span>
                    </p>
                    <p class="text-xs text-gray-600">
                        Billing: {{ ucfirst($subscription->billing_cycle) }}
                        @if($subscription->status === 'trial' && $subscription->trial_ends_at)
                            • Trial ends {{ $subscription->trial_ends_at->format('M d, Y') }}
                        @elseif($subscription->ends_at)
                            • Renews on {{ $subscription->ends_at->format('M d, Y') }}
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- Simple stats based on tenant limits --}}
    @if($tenant && $plan && $stats)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-card
                title="Branches / Stores"
                :value="$stats['branches']['count'] . ($stats['branches']['limit'] ? ' / ' . $stats['branches']['limit'] : ' / ∞')"
            />
            <x-card
                title="Warehouses"
                :value="$stats['warehouses']['count'] . ($stats['warehouses']['limit'] ? ' / ' . $stats['warehouses']['limit'] : ' / ∞')"
            />
            <x-card
                title="Users"
                :value="$stats['users']['count'] . ($stats['users']['limit'] ? ' / ' . $stats['users']['limit'] : ' / ∞')"
            />
        </div>
    @endif
</div>
@endsection