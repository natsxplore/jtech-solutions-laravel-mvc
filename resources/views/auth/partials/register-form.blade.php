<div class="space-y-1 mb-4">
    <p class="text-sm font-semibold uppercase tracking-wider text-primary">Get started</p>
    <h2 class="text-xl font-bold text-base-content">Create your account</h2>
    <p class="text-sm text-base-content/70">Complete the steps below to set up your account.</p>
</div>

{{-- Wizard steps indicator --}}
<div class="register-wizard-steps flex items-center justify-between mb-6" role="tablist" aria-label="Registration steps">
    <div class="flex items-center">
        <div class="register-wizard-dot flex items-center justify-center w-8 h-8 rounded-full text-sm font-semibold transition-all bg-indigo-600 text-white" data-step="1" aria-current="step">1</div>
        <span class="hidden sm:inline ml-2 text-sm font-medium text-gray-700">Personal</span>
    </div>
    <div class="flex-1 mx-2 h-0.5 bg-gray-200 rounded register-wizard-line" data-line="1" aria-hidden="true"></div>
    <div class="flex items-center">
        <div class="register-wizard-dot flex items-center justify-center w-8 h-8 rounded-full text-sm font-semibold transition-all bg-gray-200 text-gray-500" data-step="2">2</div>
        <span class="hidden sm:inline ml-2 text-sm font-medium text-gray-500">Company</span>
    </div>
    <div class="flex-1 mx-2 h-0.5 bg-gray-200 rounded register-wizard-line" data-line="2" aria-hidden="true"></div>
    <div class="flex items-center">
        <div class="register-wizard-dot flex items-center justify-center w-8 h-8 rounded-full text-sm font-semibold transition-all bg-gray-200 text-gray-500" data-step="3">3</div>
        <span class="hidden sm:inline ml-2 text-sm font-medium text-gray-500">Password</span>
    </div>
</div>

<form id="registerForm" class="register-wizard-form" enctype="multipart/form-data" data-url="{{ route('auth.register') }}">
    @csrf

    {{-- Step 1: Personal info --}}
    <div class="register-wizard-pane space-y-4" data-pane="1" role="tabpanel">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-form.input name="first_name" label="First name" value="{{ old('first_name') }}" autocomplete="given-name" />
            <x-form.input name="middle_name" label="Middle name" value="{{ old('middle_name') }}" />
            <x-form.input name="last_name" label="Last name" value="{{ old('last_name') }}" autocomplete="family-name" />
        </div>
        <x-form.input name="email" id="reg-email" type="email" label="Email address" value="{{ old('email') }}" autocomplete="email" />
    </div>

    {{-- Step 2: Company & location --}}
    <div class="register-wizard-pane hidden space-y-4" data-pane="2" role="tabpanel">
        <x-form.input name="company_name" label="Company name" value="{{ old('company_name') }}" />
        <x-form.input
            name="subdomain"
            id="reg-subdomain"
            type="text"
            label="Company identifier"
            labelOptional="(optional)"
            placeholder="e.g. mycompany — used for login"
            value="{{ old('subdomain') }}"
            hint="Letters, numbers, and hyphens only. Leave blank to auto-generate from company name."
        />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-form.input name="phone" type="tel" label="Phone" value="{{ old('phone') }}" />
            <x-form.input name="address" label="Address" value="{{ old('address') }}" />
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-form.input name="city" label="City" value="{{ old('city') }}" />
            <x-form.input name="province" label="Province" value="{{ old('province') }}" />
            <x-form.input name="country" label="Country" value="{{ old('country', 'Philippines') }}" />
        </div>
    </div>

    {{-- Step 3: Password --}}
    <div class="register-wizard-pane hidden space-y-4" data-pane="3" role="tabpanel">
        <x-form.input name="password" id="reg-password" type="password" label="Password" autocomplete="new-password" />
        <x-form.input name="password_confirmation" type="password" label="Confirm password" autocomplete="new-password" />
    </div>

    {{-- Wizard navigation --}}
    <div class="register-wizard-nav flex items-center justify-between gap-3 mt-6 pt-4 border-t border-base-300">
        <button type="button" class="register-wizard-prev btn-jtech-outline px-4 py-2 rounded-md text-sm font-medium hidden" aria-label="Previous step">Previous</button>
        <div class="flex-1"></div>
        <button type="button" class="register-wizard-next btn-jtech-primary px-5 py-2.5 rounded-md text-sm font-semibold shadow-sm" aria-label="Next step">Next</button>
        <button type="submit" class="register-wizard-submit btn-jtech-primary px-5 py-2.5 rounded-md text-sm font-semibold shadow-sm hidden w-full sm:w-auto" aria-label="Create account">Create account</button>
    </div>
</form>

<p class="mt-6 text-sm text-base-content/70 text-center">
    Already registered?
    <a href="#" class="auth-modal-switch font-semibold link link-primary" data-close="modal-register" data-open="modal-login">Sign in</a>
</p>
