<section id="pricing" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider mb-3">Pricing Plans</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Simple, transparent pricing</h2>
            <p class="text-lg text-gray-600">Choose the plan that fits your business. All plans include a 14-day free trial.</p>
        </div>
        <div class="flex items-center justify-center gap-4 mb-12">
            <span class="text-sm font-medium text-gray-900">Monthly</span>
            <button type="button" onclick="toggleBilling()" class="relative w-14 h-7 rounded-full p-1 transition-colors duration-200 bg-gray-300" id="billing-toggle" aria-label="Toggle yearly billing" aria-pressed="false">
                <span id="billing-pill" class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full shadow-md transition-transform duration-200 ease-out translate-x-0"></span>
            </button>
            <span class="text-sm font-medium text-gray-900">Yearly <span class="text-indigo-600">(Save 20%)</span></span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            <x-landing_page.pricing-card
                title="Basic"
                subtitle="For small stores just getting started"
                priceMonthly="₱1,499"
                priceYearly="₱1,199"
                :items="['Up to 1,000 products', 'Basic POS features', 'Inventory tracking', 'Email support']"
                :cta-url="route('register')"
                cta-text="Start Free Trial"
            />
            <x-landing_page.pricing-card
                title="Professional"
                subtitle="For growing businesses"
                :featured="true"
                priceMonthly="₱2,999"
                priceYearly="₱2,399"
                :items="['Up to 10,000 products', 'Advanced POS features', 'Multi-location inventory', 'Advanced analytics', 'Priority support']"
                :cta-url="route('register')"
                cta-text="Start Free Trial"
                :cta-primary="true"
            />
            <x-landing_page.pricing-card
                title="Enterprise"
                subtitle="For large operations"
                :custom-price="true"
                :items="['Unlimited products', 'Custom integrations', 'Dedicated account manager', '24/7 phone support', 'SLA guarantee']"
                cta-url="#contact"
                cta-text="Contact Sales"
            />
        </div>
        <div class="mt-12 text-center">
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-gray-50 rounded-lg">
                <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                <span class="text-sm text-gray-600">All plans come with a 14-day free trial. No credit card required.</span>
            </div>
        </div>
    </div>
</section>
