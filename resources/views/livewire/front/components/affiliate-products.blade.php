<div class="grid gap-4 mb-8 md:grid-cols-2 lg:grid-cols-3">
    <div class="md:col-span-2">
        @unless ($products->isEmpty())
        <div class="p-4 bg-white rounded-md shadow-md">
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($products as $product)
                    @foreach ($product['urls'] as $url)
                        @if ($url['key'] === 'DESKTOP')
                            <a href="{{ $url['value'] }}" class="flex flex-col group" target="_blank">
                                @if ($product['images'])
                                    @foreach ($product['images'] as $image)
                                        @if ($image['key'] === 'M')
                                            <img src="{{ $image['url'] }}" alt="{{ $product['title'] }}" class="object-contain w-full h-full mb-3 max-h-28">
                                        @endif
                                    @endforeach
                                @endif
                                <div class="text-sm text-{{ $theme->color }} group-hover:text-sky-800 max-h-20 overflow-hidden">
                                    {{ $product['title'] }}
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="flex justify-end mt-3">
                <img class="h-6" src="{{ asset('/img/bol-logo.png') }}">
            </div>
        </div>
        @endunless
    </div>
    <div class="md:col-span-2 lg:col-span-1">
        @if ($articles)
        <div class="h-full mb-8 overflow-hidden bg-white rounded-md shadow-md">
            <h2 class="flex items-center justify-between px-4 py-3 font-semibold text-white group bg-{{ $theme->color }}">
                {{ __('blog.from-our-blog') }}
            </h2>

            <div class="p-4">
                @if($articles->isNotEmpty())
                    @foreach ($articles as $article)
                    <a class="flex space-y-1 overflow-hidden text-{{ $theme->color }} rounded hover:text-sky-800" href="/blog/{{ $article->slug }}">
                        @if ($article->photo)
                            <img alt="{{ $article->name }}" src="{{ url('storage/' . $article->photo) }}" class="w-16 h-16 mr-2 rounded">
                        @endif
                        <div>
                            {{ $article->name }}
                        </div>
                    </a>
                    @endforeach
                @else
                    <span class="text-gray-600">
                        {{ __('blog.from-our-blog-none-related') }}
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
