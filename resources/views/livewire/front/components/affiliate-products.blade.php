<div>
    @unless ($products->isEmpty())
    <div class="p-4 mb-8 bg-white rounded-md shadow-md">
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-5">
            @foreach ($products as $product)
                @foreach ($product['urls'] as $url)
                    @if ($url['key'] === 'DESKTOP')
                        <a href="{{ $url['value'] }}" class="flex flex-col group" target="_blank">
                            @foreach ($product['images'] as $image)
                                @if ($image['key'] === 'M')
                                    <img src="{{ $image['url'] }}" alt="{{ $product['title'] }}" class="object-contain w-full h-full mb-3 max-h-20">
                                @endif
                            @endforeach
                            <div class="text-sm group-hover:text-sky-600">{{ $product['title'] }}</div>
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
