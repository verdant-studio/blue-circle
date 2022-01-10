<div>
    <x-slot name="meta">
        <title>{{ $page->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $page->description }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <h1 class="mb-8 text-4xl font-semibold text-sky-800">{{ $page->name }}</h1>

        @if ($template->slug === 'weather')
        <div class="grid gap-4 md:grid-cols-2">
            <div class="prose md:prose-lg lg:prose-xl">
                {!! $page->content !!}
            </div>
            <div class="bg-white rounded-md shadow-md">
                <iframe frameborder="0" scrolling="no" class="weerplazaWidget" src="https://www.weerplaza.nl/weerwidgets/regenradar/?SXNGdWxsV2lkdGg9ZmFsc2UmSXNIRD10cnVlJlpvb21MZXZlbD03LjA=" style="padding: 10px; width: 100% !important; max-width:600px !important; height: 698px !important; border: 1px solid rgb(244, 244, 244) !important; box-sizing: border-box !important;"></iframe>
            </div>
        </div>
        @else
        <div class="prose md:prose-lg lg:prose-xl">
            {!! $page->content !!}
        </div>
        @endif
    </div>
</div>
