<section class="py-16 bg-gray-50 border-t border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-2">Component showcase</p>
            <h2 class="text-2xl font-bold text-gray-900">Buttons</h2>
            <p class="text-gray-600 mt-1">Uniform styles using :root color variables</p>
        </div>

        <div class="space-y-10">
            {{-- Primary --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Primary</h3>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="btn-jtech-primary px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Primary
                    </button>
                    <button type="button" class="btn-jtech-primary px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm disabled:opacity-60" disabled>
                        Primary disabled
                    </button>
                </div>
            </div>

            {{-- Secondary --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Secondary</h3>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="btn-jtech-secondary px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors">
                        Secondary
                    </button>
                </div>
            </div>

            {{-- Outline --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Outline</h3>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="btn-jtech-outline px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors">
                        Outline
                    </button>
                </div>
            </div>

            {{-- Danger --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Danger</h3>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="btn-jtech-danger px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Delete
                    </button>
                </div>
            </div>

            {{-- Ghost --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Ghost</h3>
                <div class="flex flex-wrap gap-3">
                    <button type="button" class="btn-jtech-ghost px-5 py-2.5 rounded-lg text-sm font-semibold transition-colors">
                        Ghost
                    </button>
                </div>
            </div>

            {{-- Sizes --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Sizes</h3>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn-jtech-primary rounded-md text-xs font-semibold transition-colors px-3 py-1.5">Small</button>
                    <button type="button" class="btn-jtech-primary rounded-lg px-5 py-2.5 text-sm font-semibold transition-colors">Medium</button>
                    <button type="button" class="btn-jtech-primary rounded-lg px-6 py-3 text-base font-semibold transition-colors">Large</button>
                </div>
            </div>
        </div>
    </div>
</section>
