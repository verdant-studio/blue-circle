<div>
    <x-slot name="meta">
        <title>{{ $site->name . ' | ' . config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $site->description }}">
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl">
        <h1 class="mb-8 text-2xl font-semibold md:text-3xl lg:text-4xl text-sky-800">{{ $site->name }}</h1>
        @if ($site->intro)
            <div class="p-4 mb-8 bg-white rounded-md shadow-sm md:w-3/4">{{ $site->intro}}</div>
        @endif

        @if ($blocks->count() > 8)
            <div class="grid gap-4 mb-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($blocks as $block)
                    @if ($loop->index === 8)
                        </div>
                        @livewire('front.components.affiliate-products', ['site' => $site, 'theme' => $theme])
                        <div class="grid gap-4 mb-8 md:grid-cols-2 lg:grid-cols-4">
                    @endif
                    <div class="flex flex-col h-full overflow-hidden bg-white rounded-md shadow-md">
                        <div class="flex items-center justify-between px-4 py-3 font-semibold text-white group bg-{{ $theme->color }}">
                            {{ $block->name }}
                        </div>

                        <div class="flex flex-col justify-between h-full p-4">
                            @if ($block->content)
                                <p class="mb-3">{{ $block->content }}</p>
                            @endif

                            <ul class="flex-grow">
                                @foreach ($block->links()->orderBy('position')->get() as $link)
                                <li class="relative pr-6 mb-2 group">
                                    <a class="text-{{ $theme->color }} hover:text-sky-800" href="{{ $link->link }}" target="_blank">
                                        @if ($link->icon === 'icon-new')
                                            <x-label-new />
                                        @elseif ($link->icon === 'icon-tip')
                                            <x-label-tip />
                                        @endif
                                        {{ $link->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid gap-4 mb-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($blocks as $block)
                    <div class="flex flex-col h-full overflow-hidden bg-white rounded-md shadow-md">
                        <div class="flex items-center justify-between px-4 py-3 font-semibold text-white group bg-{{ $theme->color }}">
                            {{ $block->name }}
                        </div>

                        <div class="flex flex-col justify-between h-full p-4">
                            @if ($block->content)
                                <p class="mb-3">{{ $block->content }}</p>
                            @endif

                            <ul class="flex-grow">
                                @foreach ($block->links()->orderBy('position')->get() as $link)
                                <li class="relative pr-6 mb-2 group">
                                    <a class="text-{{ $theme->color }} hover:text-sky-800" href="{{ $link->link }}" target="_blank">
                                        @if ($link->icon === 'icon-new')
                                            <x-label-new />
                                        @elseif ($link->icon === 'icon-tip')
                                            <x-label-tip />
                                        @endif
                                        {{ $link->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            @livewire('front.components.affiliate-products', ['site' => $site, 'theme' => $theme])
        @endif

    </div>
</div>
