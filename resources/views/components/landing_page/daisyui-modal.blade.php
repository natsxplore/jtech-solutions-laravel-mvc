{{-- DaisyUI Modal (checkbox-based, no JS required) --}}
<div class="flex flex-wrap gap-2">
    <label for="daisyui-modal-demo" class="btn btn-primary">Open Modal</label>
</div>

<input type="checkbox" id="daisyui-modal-demo" class="modal-toggle" />
<div class="modal" role="dialog" aria-label="Sample modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">DaisyUI Modal</h3>
        <p class="py-4">This is a sample modal built with DaisyUI. It uses a hidden checkbox and label—no JavaScript needed. Click &quot;Close&quot; or the backdrop to close.</p>
        <div class="modal-action">
            <label for="daisyui-modal-demo" class="btn btn-primary">Close</label>
        </div>
    </div>
    <label class="modal-backdrop" for="daisyui-modal-demo" aria-hidden="true">Close</label>
</div>
