<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-3">FAQ</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently asked questions</h2>
            <p class="text-lg text-gray-600">Everything you need to know about JTech Solution.</p>
        </div>

        <div class="rounded-xl border border-base-300 overflow-hidden shadow-sm bg-base-100">
            @foreach ([
                ['q' => 'Can I switch plans later?', 'a' => 'Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.'],
                ['q' => 'Is there a long-term contract?', 'a' => 'No, all our plans are month-to-month. You can cancel anytime with no penalties.'],
                ['q' => 'Do you offer training?', 'a' => 'Yes, we provide onboarding assistance and training for all new customers. Enterprise plans include dedicated training sessions.'],
                ['q' => 'Can I use it offline?', 'a' => 'Yes, our POS system works offline and automatically syncs when reconnected.'],
            ] as $i => $faq)
                <div class="collapse collapse-arrow border-base-300 border-b last:border-b-0">
                    <input type="radio" name="faq-accordion" {{ $i === 0 ? 'checked' : '' }} />
                    <div class="collapse-title font-semibold text-base-content">
                        {{ $faq['q'] }}
                    </div>
                    <div class="collapse-content">
                        <p class="text-base-content/80">{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
