<div>
    <x-slot name="meta">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $siteDescription ?? false }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($categories as $category)
                <div class="flex flex-col h-full overflow-hidden bg-white rounded-md shadow-md">
                    <div class="flex items-center justify-between px-4 py-3 font-semibold text-white group bg-sky-600">
                        {{ $category->name }}
                    </div>

                    <div class="flex flex-col h-full p-4">
                        @foreach ($category->sites()->orderBy('name')->get() as $site)
                            <a href="{{ url($site->slug) }}">{{ $site->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
