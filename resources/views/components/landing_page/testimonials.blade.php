<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-3">Testimonials</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Trusted by business owners</h2>
            <p class="text-lg text-gray-600">See what our customers have to say about JTech Solution.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ([
                ['quote' => "JTech Solution transformed how we manage our store chain. What used to take hours now happens automatically. I can check inventory and sales from my phone.", 'author' => 'Maria Santos', 'role' => 'Owner, Santos Family Mart', 'initials' => 'MS'],
                ['quote' => "The system is intuitive — my staff learned it in under an hour. The reports give me insights I never had before.", 'author' => 'Roberto Cruz', 'role' => 'Managing Partner, Cruz Hardware', 'initials' => 'RC'],
                ['quote' => "Running 3 branches used to mean separate spreadsheets. Now everything is in one dashboard with real-time stock updates.", 'author' => 'Jennifer Lim', 'role' => 'Operations Manager, Lim\'s Supermarket', 'initials' => 'JL'],
            ] as $testimonial)
                <div class="bg-white rounded-xl border border-gray-200 p-8 hover:border-indigo-200 hover:shadow-lg transition-all">
                    <div class="flex gap-1 mb-4">
                        @for ($s = 0; $s < 5; $s++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 mb-6 italic">"{{ $testimonial['quote'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-sm font-bold text-indigo-600">{{ $testimonial['initials'] }}</div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">{{ $testimonial['author'] }}</p>
                            <p class="text-xs text-gray-500">{{ $testimonial['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
