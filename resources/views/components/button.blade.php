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
        'primary' => 'btn-primary focus:ring-4 focus:ring-indigo-300',
        'secondary' => 'btn-secondary focus:ring-4 focus:ring-gray-300',
        'outline' => 'btn-outline focus:ring-4 focus:ring-gray-200',
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

