@props([
    'as' => 'button', // 'button' or 'a'
    'href' => null,
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, outline
    'size' => 'md', // sm, md, lg
])

@php
    $base = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none focus:ring-4 text-sm';

    $variants = [
        'primary' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300',
        'secondary' => 'text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-gray-300',
        'outline' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-200',
    ];

    $sizes = [
        'sm' => 'px-3 py-2',
        'md' => 'px-5 py-2.5',
        'lg' => 'px-6 py-3',
    ];

    $classes = trim($base . ' ' .
        ($variants[$variant] ?? $variants['primary']) . ' ' .
        ($sizes[$size] ?? $sizes['md']));
@endphp

@if($as === 'a' || $href)
    <a href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

