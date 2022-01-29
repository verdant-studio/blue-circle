<div>
    <x-slot name="meta">
        <title>{{ $article->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $article->description }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        @if ($article->photo)
            <img alt="{{ $article->name }}" src="{{ url('storage/' . $article->photo) }}" class="w-full">
        @endif
        <h1 class="mb-8 text-4xl font-semibold text-sky-800">{{ $article->name }}</h1>

        <div class="mb-8 prose md:prose-lg max-w-none">
            {!! $article->content !!}
        </div>
    </div>
</div>
