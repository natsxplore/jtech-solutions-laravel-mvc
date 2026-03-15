<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-3">FAQ</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently asked questions</h2>
            <p class="text-lg text-gray-600">Everything you need to know about JTech Solution.</p>
        </div>
        <div class="space-y-3">
            @foreach ([
                ['q' => 'Can I switch plans later?', 'a' => 'Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.'],
                ['q' => 'Is there a long-term contract?', 'a' => 'No, all our plans are month-to-month. You can cancel anytime with no penalties.'],
                ['q' => 'Do you offer training?', 'a' => 'Yes, we provide onboarding assistance and training for all new customers. Enterprise plans include dedicated training sessions.'],
                ['q' => 'Can I use it offline?', 'a' => 'Yes, our POS system works offline and automatically syncs when reconnected.'],
            ] as $faq)
                <div class="faq-item bg-white rounded-md border border-gray-200 overflow-hidden">
                    <button type="button" class="faq-trigger flex items-center justify-between w-full text-left px-6 py-5 gap-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-inset" aria-expanded="false">
                        <span class="text-base font-semibold text-gray-900">{{ $faq['q'] }}</span>
                        <svg class="faq-chevron w-5 h-5 text-gray-500 shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div class="faq-answer grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
                        <div class="overflow-hidden min-h-0">
                            <p class="px-6 pb-5 pt-0 text-gray-600 border-t border-gray-100">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
