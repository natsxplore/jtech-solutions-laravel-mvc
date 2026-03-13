@extends('layouts.guest')

@section('title', 'Page Not Found')

@section('content')

<div class="space-y-6">

    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500 mb-2">
            Error 404
        </p>

        <h2 class="text-2xl font-bold text-gray-900 mb-2">
            The page you’re looking for can’t be found.
        </h2>

        <p class="text-sm text-gray-600">
            The page may have been moved, deleted, or the URL might be incorrect.
            Please check the address or navigate back to the homepage.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row gap-3">
        <x-button as="a" :href="url('/')" variant="primary">
            Back to Homepage
        </x-button>

        <x-button as="a" :href="route('login')" variant="outline">
            Go to Login
        </x-button>
    </div>

    <div class="border-t border-gray-100 pt-4">
        <p class="text-xs text-gray-500">
            If you believe this is an error, please contact the system administrator.
        </p>
    </div>

</div>
@endsection
