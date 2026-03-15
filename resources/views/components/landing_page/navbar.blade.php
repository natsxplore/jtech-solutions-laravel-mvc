<header class="sticky top-0 z-50 bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-9 h-9 rounded-md bg-indigo-600">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-lg font-bold text-gray-900">{{ config('app.name', 'JTech Solution') }}</span>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">Features</a>
                <a href="#solutions" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">Solutions</a>
                <a href="#pricing" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">Pricing</a>
                <a href="#resources" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">Resources</a>
                <a href="#testimonials" class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">Testimonials</a>
            </nav>
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition-colors px-4 py-2">Log in</a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-5 py-2 rounded-md btn-primary text-sm font-semibold shadow-sm">Start Free Trial</a>
            </div>
            <button type="button" class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100 transition-colors" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" aria-label="Menu">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 py-4 space-y-2">
            <a href="#features" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors">Features</a>
            <a href="#solutions" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors">Solutions</a>
            <a href="#pricing" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors">Pricing</a>
            <a href="#resources" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors">Resources</a>
            <a href="#testimonials" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors">Testimonials</a>
            <div class="pt-2 border-t border-gray-200 space-y-2">
                <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 rounded-md transition-colors">Log in</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-md transition-colors text-center">Start Free Trial</a>
            </div>
        </div>
    </div>
</header>
