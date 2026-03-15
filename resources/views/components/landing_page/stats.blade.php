<section class="py-16 bg-gray-50 border-y border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold text-gray-500 uppercase tracking-wider mb-12">
            Trusted by 500+ growing businesses across the Philippines
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
            @foreach ([
                ['value' => '500+',  'label' => 'Active Businesses'],
                ['value' => '2M+',   'label' => 'Transactions'],
                ['value' => '99.9%', 'label' => 'Uptime SLA'],
                ['value' => '4.9★',  'label' => 'Customer Rating'],
            ] as $stat)
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-bold text-indigo-600 mb-1">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
        <div class="flex flex-wrap justify-center gap-8 items-center opacity-60">
            @foreach (['RetailCo', 'FreshMart', 'QuickStop', 'TechGoods', 'StyleHub', 'GreenBite'] as $logo)
                <span class="text-lg font-semibold text-gray-400">{{ $logo }}</span>
            @endforeach
        </div>
    </div>
</section>
