{{-- DaisyUI Collapse / Accordion --}}
<div class="rounded-box border border-base-300 bg-base-100">
    @foreach ([
        ['title' => 'What is JTech Solution?', 'body' => 'JTech Solution is an all-in-one retail management platform for sales, inventory, POS, and reporting.'],
        ['title' => 'How do I get started?', 'body' => 'Sign up for a 14-day free trial. No credit card required. We\'ll guide you through setup.'],
        ['title' => 'Can I use it offline?', 'body' => 'Yes. Our POS works offline and syncs automatically when you\'re back online.'],
    ] as $i => $item)
        <div class="collapse collapse-arrow border-base-300 border-b last:border-b-0">
            <input type="radio" name="daisyui-accordion" {{ $i === 0 ? 'checked' : '' }} />
            <div class="collapse-title font-medium">
                {{ $item['title'] }}
            </div>
            <div class="collapse-content">
                <p class="text-base-content/80">{{ $item['body'] }}</p>
            </div>
        </div>
    @endforeach
</div>
