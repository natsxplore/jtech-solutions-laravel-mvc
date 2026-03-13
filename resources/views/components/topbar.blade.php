<header class="bg-white shadow flex items-center justify-between px-6 h-16">
    <div class="text-lg font-semibold">@yield('page-title', 'Dashboard')</div>
    <div class="flex items-center space-x-4">
        <div>{{ auth()->user()->name ?? auth()->user()->first_name . ' ' . auth()->user()->last_name }}</div>
        <a href="{{ route('logout') }}" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</a>
        <button id="dropdownButton" data-dropdown-toggle="userDropdown" class="text-gray-600 hover:text-gray-800">
            ▼
        </button>
        <!-- Dropdown -->
        <div id="userDropdown" class="hidden z-10 w-44 bg-white rounded shadow-md">
            <ul class="py-1 text-sm text-gray-700">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
            </ul>
        </div>
    </div>
</header>
