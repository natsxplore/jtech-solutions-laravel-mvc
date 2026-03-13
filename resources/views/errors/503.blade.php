@extends('layouts.guest')

@section('title', 'Service Unavailable')

@section('content')

<div class="space-y-6">
    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500 mb-2">
            System Status
        </p>

        <h2 class="text-2xl font-bold text-gray-900 mb-2">
            We’re currently performing maintenance.
        </h2>

        <p class="text-sm text-gray-600">
            Our system is temporarily unavailable while we improve performance and stability.
            Please check back again shortly.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row gap-3">
        <x-button as="a" :href="url('/')" variant="primary">
            Back to Homepage
        </x-button>

        <x-button as="a" :href="route('login')" variant="outline">
            Try Again Later
        </x-button>
    </div>

    <div class="border-t border-gray-100 pt-4">
        <p class="text-xs text-gray-500">
            If the problem persists, please contact the system administrator or support team.
        </p>
    </div>
</div>
@endsection
