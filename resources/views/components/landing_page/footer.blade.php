<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-16 grid grid-cols-2 md:grid-cols-5 gap-8">
            <div class="col-span-2 md:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-9 h-9 rounded-lg bg-indigo-600">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <span class="text-base font-bold text-white">{{ config('app.name', 'JTech Solution') }}</span>
                </div>
                <p class="text-sm leading-relaxed mb-5 text-gray-400">Enterprise-grade retail management simplified for small businesses.</p>
            </div>
            @foreach ([
                'Product' => ['Features', 'Pricing', 'Integrations', 'Changelog'],
                'Solutions' => ['Retail', 'Grocery', 'Restaurant', 'Pharmacy'],
                'Resources' => ['Documentation', 'Tutorials', 'Blog', 'Support'],
                'Company' => ['About', 'Contact', 'Privacy', 'Terms'],
            ] as $category => $links)
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4">{{ $category }}</h4>
                    <ul class="space-y-3">
                        @foreach ($links as $link)
                            <li><a href="#" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="border-t border-gray-800 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} {{ config('app.name', 'JTech Solution') }}. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-sm text-gray-500 hover:text-indigo-400 transition-colors">Privacy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-indigo-400 transition-colors">Terms</a>
                <a href="#" class="text-sm text-gray-500 hover:text-indigo-400 transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>
