@extends('layouts.guest')

@section('title', 'JTech Solution — Enterprise Retail Management for Small Business')
@section('meta_description', 'Complete Sales, Inventory, POS & Reporting solution that scales with your business. Trusted by 500+ growing businesses.')

@section('content')

<x-landing_page.navbar />

{{-- Login modal (only close via X or Close button) --}}
<x-modal id="modal-login" title="Log in" :closeOnlyByButton="true">
    @include('auth.partials.login-form')
</x-modal>

{{-- Register modal (only close via X or Close button) --}}
<x-modal id="modal-register" title="Create account" :closeOnlyByButton="true">
    <div class="max-h-[70vh] overflow-y-auto pr-1">
        @include('auth.partials.register-form')
    </div>
</x-modal>

<x-landing_page.hero />
<x-landing_page.features />
<x-landing_page.pricing />
{{-- <x-landing_page.stats /> --}}
{{-- <x-landing_page.testimonials /> --}}
<x-landing_page.faq />
<x-landing_page.daisyui-showcase />
{{-- <x-landing_page.cta /> --}}
<x-landing_page.footer />
<x-landing_page.scripts />
@endsection
