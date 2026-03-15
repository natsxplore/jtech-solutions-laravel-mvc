@props([
    'title' => '',
    'subtitle' => '',
    'featured' => false,
    'priceMonthly' => null,
    'priceYearly' => null,
    'priceSuffixMonthly' => '/month',
    'priceSuffixYearly' => '/month, billed yearly',
    'customPrice' => false,
    'items' => [],
    'ctaUrl' => '#',
    'ctaText' => 'Get started',
    'ctaPrimary' => false,
])

@php
    $cardClass = $featured
        ? 'bg-white rounded-xl border-2 border-indigo-600 p-8 shadow-xl scale-105 relative flex flex-col h-full'
        : 'bg-white rounded-xl border border-gray-200 p-8 hover:border-indigo-200 hover:shadow-lg transition-all flex flex-col h-full';
@endphp

<div {{ $attributes->merge(['class' => $cardClass]) }}>
    @if($featured)
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full">MOST POPULAR</div>
    @endif
    <div class="flex flex-col flex-1 min-h-0">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>
            <p class="text-sm text-gray-600">{{ $subtitle }}</p>
        </div>
        <div class="mb-6">
            @if($customPrice)
                <span class="text-4xl font-bold text-gray-900">Custom</span>
            @else
                <span class="text-4xl font-bold text-gray-900" data-monthly="{{ $priceMonthly }}" data-yearly="{{ $priceYearly }}">{{ $priceMonthly }}</span>
                <span class="text-sm text-gray-600" data-monthly="{{ $priceSuffixMonthly }}" data-yearly="{{ $priceSuffixYearly }}">{{ $priceSuffixMonthly }}</span>
            @endif
        </div>
        <ul class="space-y-4 mb-8 flex-1">
            @foreach($items as $f)
                <li class="flex items-start gap-3 text-sm text-gray-600">
                    <svg class="w-5 h-5 text-indigo-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    {{ $f }}
                </li>
            @endforeach
        </ul>
    </div>
    <x-button
        as="a"
        :href="$ctaUrl"
        :variant="$ctaPrimary ? 'primary' : 'outline'"
        class="w-full justify-center rounded-lg px-4 py-3 mt-auto shrink-0"
    >
        {{ $ctaText }}
    </x-button>
</div>
