<section class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-sm font-medium mb-8">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    Trusted by 500+ businesses nationwide
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight mb-6">
                    Enterprise-Grade Retail Management,
                    <span class="text-indigo-600">Simplified for Growth</span>
                </h1>
                <p class="text-lg text-gray-600 leading-relaxed mb-8 max-w-xl">
                    Complete Sales, Inventory, POS & Reporting solution that scales with your business. Everything you need in one powerful platform.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <label for="modal-register" class="inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-4 text-sm px-6 py-3 btn-jtech-primary focus:ring-4 focus:ring-indigo-300 cursor-pointer">
                        Start 14-Day Free Trial
                        <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </label>

                    <x-button href="#demo" variant="outline" size="lg" as="a">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Watch Demo
                    </x-button>

                </div>
                <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        <span>No credit card required</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        <span>14-day free trial</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        <span>Cancel anytime</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-900 rounded-2xl shadow-2xl border border-gray-800 overflow-hidden">
                <div class="bg-gray-800 px-4 py-3 flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="ml-2 text-xs text-gray-400">Dashboard Preview</span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-800 p-4 rounded-md">
                            <p class="text-xs text-gray-400 mb-1">Today's Sales</p>
                            <p class="text-xl font-bold text-white">₱48,291</p>
                            <p class="text-xs text-green-500 mt-1">↑ 14% vs yesterday</p>
                        </div>
                        <div class="bg-gray-800 p-4 rounded-md">
                            <p class="text-xs text-gray-400 mb-1">Items Sold</p>
                            <p class="text-xl font-bold text-white">1,247</p>
                            <p class="text-xs text-green-500 mt-1">↑ 8% vs yesterday</p>
                        </div>
                    </div>
                    <div class="h-32 bg-gray-800 rounded-md flex items-end gap-2 p-4">
                        @foreach([65, 82, 54, 78, 95, 70] as $height)
                            <div class="flex-1 bg-indigo-500 rounded-t" style="height: {{ $height }}%"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
