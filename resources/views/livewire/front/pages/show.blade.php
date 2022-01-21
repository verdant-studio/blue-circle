<div>
    <x-slot name="meta">
        <title>{{ $page->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $page->description }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <h1 class="mb-8 text-4xl font-semibold text-sky-800">{{ $page->name }}</h1>

        <div class="mb-8 prose md:prose-lg max-w-none">
            {!! $page->content !!}
        </div>

        @if ($template->slug === 'contact')
            @livewire('front.components.contact-form')
        @elseif ($template->slug === 'weather')
            @livewire('front.components.widget-weather')
        @endif
    </div>
</div>
