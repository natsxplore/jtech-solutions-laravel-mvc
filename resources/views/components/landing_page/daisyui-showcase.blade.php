<section class="py-20 bg-base-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <p class="text-sm font-semibold text-primary uppercase tracking-wider mb-3">DaisyUI</p>
            <h2 class="text-3xl md:text-4xl font-bold text-base-content mb-4">Component showcase</h2>
            <p class="text-lg opacity-80">Sample components built with DaisyUI. Use these as reference on the landing page.</p>
        </div>

        <div class="space-y-14">
            {{-- Buttons --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Buttons</h3>
                <x-landing_page.daisyui-buttons />
            </div>

            {{-- Badges --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Badges</h3>
                <x-landing_page.daisyui-badges />
            </div>

            {{-- Accordion --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Accordion (collapse)</h3>
                <x-landing_page.daisyui-accordion />
            </div>

            {{-- Modal --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Modal</h3>
                <x-landing_page.daisyui-modal />
            </div>

            {{-- Cards --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Cards</h3>
                <x-landing_page.daisyui-cards />
            </div>

            {{-- Alerts --}}
            <div>
                <h3 class="text-lg font-semibold text-base-content mb-4">Alerts</h3>
                <x-landing_page.daisyui-alerts />
            </div>
        </div>
    </div>
</section>
