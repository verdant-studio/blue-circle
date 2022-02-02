<div>
    <x-slot name="meta">
        <title>{{ 'Blog | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $blog->description ?? '' }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <h1 class="mb-8 text-4xl font-semibold text-sky-800">Blog</h1>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($articles as $article)
            <a href="{{ route('blog') }}/{{ $article->slug }}" class="flex flex-col h-full overflow-hidden bg-white rounded-md shadow-md hover:text-white hover:bg-sky-600">
                <img src="{{ url('storage/' . $article->photo) }}" alt="{{ $article->title }}" class="object-cover w-full h-32 md:h-48">
                <div class="p-4">
                    <h2 class="lg:text-lg">{{ $article->name }}</h2>
                    {{ $article->created_at->format('j F, Y') }}
                </div>
            </a>
            @endforeach
        </div>

        {{ $articles->links() }}
    </div>
</div>
