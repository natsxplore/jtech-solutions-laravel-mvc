<section id="features" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-3">Core Capabilities</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Everything you need to run your business</h2>
            <p class="text-lg text-gray-600">Three powerful modules that work together seamlessly to give you complete control.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-landing_page.feature-card
                title="Sales & POS"
                description="Lightning-fast checkout with support for multiple payment methods and offline mode."
                :items="['Multiple payment methods', 'Barcode & QR scanning', 'Offline mode support']"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </x-slot:icon>
            </x-landing_page.feature-card>

            <x-landing_page.feature-card
                title="Inventory Control"
                description="Real-time stock tracking across locations with intelligent alerts."
                :items="['Multi-location tracking', 'Low stock alerts', 'Purchase order management']"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                </x-slot:icon>
            </x-landing_page.feature-card>

            <x-landing_page.feature-card
                title="Advanced Analytics"
                description="Deep insights into your business performance with customizable reports."
                :items="['P&L reports', 'Sales forecasting', 'Custom report builder']"
            >
                <x-slot:icon>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                </x-slot:icon>
            </x-landing_page.feature-card>
        </div>
    </div>
</section>
