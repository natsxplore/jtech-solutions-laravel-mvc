@extends('layouts.guest')

@section('title', 'Welcome | ' . config('app.name', 'JTech Solution'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-500 mb-2">Welcome</p>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                Smart retail & inventory insights in one dashboard.
            </h2>
            <p class="text-sm text-gray-600">
                Streamline your sales, inventory, and reports with a modern Laravel-powered back office.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <x-button as="a" :href="route('login')" variant="primary">
                Log in
            </x-button>
            <x-button as="a" :href="route('register')" variant="outline">
                Create an account
            </x-button>
        </div>

        <div class="border-t border-gray-100 pt-4">
            <p class="text-xs text-gray-500">
                Demo links only – hook these pages up to your auth logic when ready.
            </p>
        </div>
    </div>
@endsection

