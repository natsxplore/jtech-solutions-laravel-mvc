@props([
    'id',  // required: unique id for this modal (e.g. 'modal-login')
    'title' => null,
    'closeOnlyByButton' => true,
])

@php
    $closeOnlyByButton = filter_var($closeOnlyByButton ?? true, FILTER_VALIDATE_BOOLEAN);
@endphp

<input type="checkbox" id="{{ $id }}" class="modal-toggle" />
<div class="modal" role="dialog" aria-labelledby="{{ $id }}-title" aria-modal="true">
    <div class="modal-box">
        <div class="flex items-center justify-between gap-4 mb-2">
            @if($title)
                <h3 id="{{ $id }}-title" class="font-bold text-lg">{{ $title }}</h3>
            @else
                <span id="{{ $id }}-title" class="sr-only">Close modal</span>
            @endif
            <label for="{{ $id }}" class="btn btn-ghost btn-sm btn-circle shrink-0" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
        </div>
        <div class="{{ $title ? '' : 'pt-0' }}">
            {{ $slot }}
        </div>
        <div class="modal-action">
            @if(isset($footer))
                {{ $footer }}
            {{-- @else
                <label for="{{ $id }}" class="btn btn-primary">Close</label> --}}
            @endif
        </div>
    </div>
    {{-- Backdrop: div only (not a label), so clicking outside does NOT close the modal --}}
    {{-- @if($closeOnlyByButton)
        <div class="modal-backdrop bg-black/50 cursor-default" aria-hidden="true"></div>
    @else
        <label class="modal-backdrop" for="{{ $id }}" aria-hidden="true">Close</label>
    @endif --}}
</div>
