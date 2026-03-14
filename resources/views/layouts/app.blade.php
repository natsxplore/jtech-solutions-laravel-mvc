<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(auth()->check())
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
    @endif
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        @include('components.topbar')

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
