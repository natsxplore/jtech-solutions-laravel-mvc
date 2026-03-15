@props([
    'title' => '',
    'description' => '',
    'items' => [],
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-gray-200 p-8 hover:border-indigo-200 hover:shadow-lg transition-all']) }}>
    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-indigo-100 text-indigo-600 mb-5">
        {{ $icon ?? '' }}
    </div>
    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $title }}</h3>
    <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ $description }}</p>
    <ul class="space-y-3">
        @foreach($items as $item)
            <li class="flex items-start gap-2 text-sm text-gray-600">
                <svg class="w-4 h-4 mt-0.5 text-indigo-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                {{ $item }}
            </li>
        @endforeach
    </ul>
</div>
