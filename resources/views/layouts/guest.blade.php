<!DOCTYPE html>
<html lang="en">
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
<body class="bg-gray-100 font-sans antialiased min-h-screen flex items-center justify-center py-8 px-4">
    <div class="w-full max-w-4xl flex flex-col md:flex-row bg-white rounded-lg shadow-md overflow-hidden">
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-indigo-600 via-blue-500 to-sky-400 items-center justify-center p-10 text-white">
            <div class="space-y-4">
                <h1 class="text-3xl font-bold tracking-tight">JTech Solution</h1>
                <p class="text-sm text-indigo-100">
                    Lightweight Laravel MVC starter with a clean dashboard layout. Use this guest layout for public pages like landing, login, and register.
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8">
            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>
</html>
