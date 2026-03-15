@extends('layouts.guest')

@section('title', 'JTech Solution — Enterprise Retail Management for Small Business')
@section('meta_description', 'Complete Sales, Inventory, POS & Reporting solution that scales with your business. Trusted by 500+ growing businesses.')

@section('content')

<x-landing_page.navbar />
<x-landing_page.hero />
<x-landing_page.features />
<x-landing_page.pricing />
{{-- <x-landing_page.stats /> --}}
{{-- <x-landing_page.testimonials /> --}}
<x-landing_page.faq />
{{-- <x-landing_page.cta /> --}}
<x-landing_page.footer />
<x-landing_page.scripts />

@endsection
