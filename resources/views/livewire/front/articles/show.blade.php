<div>
    <x-slot name="meta">
        <title>{{ $article->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $article->description }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        @if ($article->photo)
            <img alt="{{ $article->name }}" src="{{ url('storage/' . $article->photo) }}" class="w-full mb-8">
        @endif

        <div class="mb-8">
            <h1 class="mb-2 text-2xl font-semibold md:text-3xl lg:text-4xl text-sky-800">{{ $article->name }}</h1>
            {{ Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}
        </div>

        <div class="mb-8 prose md:prose-lg max-w-none hover:prose-a:text-sky-700 prose-a:text-orange-700">
            {!! $article->content !!}
        </div>
    </div>
</div>
