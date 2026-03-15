<div class="space-y-1 mb-6">
    <p class="text-sm font-semibold uppercase tracking-wider text-primary">Sign in</p>
    <h2 class="text-xl font-bold text-base-content">Welcome back</h2>
    <p class="text-sm text-base-content/70">Use your email and password to access the dashboard.</p>
</div>

<form id="loginForm" class="space-y-4" data-url="{{ route('auth.login') }}">
    @csrf

    <x-form.input
        name="subdomain"
        id="login-subdomain"
        type="text"
        label="Company / subdomain"
        labelOptional="(optional)"
        placeholder="e.g. acme"
        value="{{ old('subdomain') }}"
        autocomplete="username"
        hint="Use when you have multiple accounts with the same email."
    />

    <x-form.input
        name="email"
        id="login-email"
        type="email"
        label="Email address"
        placeholder="you@example.com"
        value="{{ old('email') }}"
        autocomplete="email"
    />

    <x-form.input
        name="password"
        id="login-password"
        type="password"
        label="Password"
        placeholder="••••••••"
        autocomplete="current-password"
    />

    <div class="form-control flex-row items-center justify-between gap-2">
        <label class="label cursor-pointer gap-2 py-0">
            <input type="checkbox" name="remember" class="checkbox checkbox-primary checkbox-sm checkbox-focus-primary">
            <span class="label-text">Remember me</span>
        </label>
        <a href="#" class="label-text-alt link link-primary no-underline">Forgot password?</a>
    </div>

    <div class="form-control pt-1">
        <x-button type="submit" variant="primary" class="w-full justify-center rounded-lg px-5 py-2.5">
            Sign in
        </x-button>
    </div>
</form>

<p class="mt-6 text-sm text-base-content/70 text-center">
    Don't have an account?
    <a href="#" class="auth-modal-switch font-semibold link link-primary" data-close="modal-login" data-open="modal-register">Create one</a>
</p>
