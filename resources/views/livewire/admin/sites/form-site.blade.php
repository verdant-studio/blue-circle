<div>
    <div class="mb-8">
        @livewire('admin.sites.modal-create-block', ['site_id' => $site_id])
    </div>

    @if (session('success'))
        <x-message-success>{{ session('success') }}</x-message-success>
    @endif

    @if (session('error'))
        <x-message-error>{{ session('error') }}</x-message-error>
    @endif

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($blocks as $block)
            <div class="flex flex-col h-full overflow-hidden bg-white rounded-md">
                <div class="flex items-center justify-between px-4 py-3 font-semibold group bg-secondary-400">
                    <span>{{ $block->name }}</span>
                    <div class="flex items-center">
                        @can('sites update')
                            <div>
                                @livewire('admin.sites.modal-edit-block', ['block' => $block], key(time().$site_id))
                            </div>
                        @endcan
                    </div>
                </div>

                @can('sites update')
                    <div class="flex flex-col justify-between h-full p-4">
                        <ul class="flex-grow">
                            @foreach ($block->links()->get() as $link)
                                <li class="relative pr-6 mb-2 group">
                                    <a class="text-tertiary-600 hover:text-tertiary-800" href="{{ $link->link }}" target="_blank">
                                        @if ($link->icon === 'icon-new')
                                            <span class="p-1 text-xs font-semibold text-black rounded bg-tags-new">{{ __('sites.icons.icon-new') }}</span>
                                        @elseif ($link->icon === 'icon-tip')
                                            <span class="p-1 text-xs font-semibold text-black rounded bg-tags-tip">{{ __('sites.icons.icon-tip') }}</span>
                                        @endif
                                        {{ $link->name }}
                                    </a>
                                    <div class="absolute top-0 right-0 hidden group-hover:block">
                                        @livewire('admin.sites.modal-edit-block-link', ['data' => $link], key(time().$site_id))
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex-none mt-3">
                            @livewire('admin.sites.modal-create-block-link', ['block_id' => $block->id], key($block->id))
                        </div>
                    </div>
                @endcan
            </div>
        @endforeach
    </div>
</div>
