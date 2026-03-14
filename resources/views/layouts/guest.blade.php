<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'JTech Solution'))</title>
    @vite(['resources/css/app.css'])
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('js/jquery-setup.js') }}"></script>
    @vite(['resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    @yield('content')
    @stack('scripts')
</body>
</html>
