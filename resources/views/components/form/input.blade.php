@props([
    'name',
    'id' => null,
    'type' => 'text',
    'label' => '',
    'labelOptional' => null,
    'placeholder' => null,
    'value' => null,
    'hint' => null,
    'required' => false,
    'autocomplete' => null,
])

@php
    $id = $id ?? str_replace(['.', '[]'], ['_', ''], $name);
    $value = $value ?? old($name);
@endphp

<div class="form-control">
    <label for="{{ $id }}" class="label">
        <span class="label-text">
            {{ $label }}
            @if($labelOptional)
                <span class="text-base-content/50 font-normal">{{ $labelOptional }}</span>
            @endif
        </span>
    </label>
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $value }}"
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        {{ $attributes->merge(['class' => 'input input-bordered w-full input-focus-primary']) }}
    >
    @if($hint)
        <label class="label">
            <span class="label-text-alt text-base-content/60">{{ $hint }}</span>
        </label>
    @endif
</div>
