<div>
    <x-slot name="meta">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="test">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <h1 class="mb-8 text-4xl font-semibold text-sky-800">Blog</h1>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($articles as $article)
            <a href="{{ route('blog') }}/{{ $article->slug }}" class="flex flex-col h-full p-4 overflow-hidden bg-white rounded-md shadow-md hover:text-white hover:bg-sky-600">
                <h2 class="lg:text-lg">{{ $article->name }}</h2>
                {{ $article->created_at->format('j F, Y') }}
            </a>
            @endforeach
        </div>

        {{ $articles->links() }}
    </div>
</div>
