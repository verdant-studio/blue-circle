<div>
    <div class="flex justify-end mb-8">
        @livewire('admin.sites.modal-create-block', ['site_id' => $site_id])
    </div>

    @if (session('success'))
        <x-message-success>{{ session('success') }}</x-message-success>
    @endif

    @if (session('error'))
        <x-message-error>{{ session('error') }}</x-message-error>
    @endif

    <div wire:sortable="updateBlockOrder" wire:sortable-group="updateLinkOrder" class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($blocks as $block)
            <div wire:sortable.item="{{ $block->id }}" wire:key="block-{{ $block->id }}" class="flex flex-col h-full overflow-hidden bg-white rounded-md shadow-md">
                <div class="flex items-center justify-between px-4 py-3 font-semibold text-white group bg-{{ $theme->color }}">
                    <span wire:sortable.handle class="cursor-move">{{ $block->name }}</span>
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
                        @if ($block->content)
                            <p class="mb-3">{{ $block->content }}</p>
                        @endif

                        <ul wire:sortable-group.item-group="{{ $block->id }}" class="flex-grow">
                            @foreach ($block->links()->orderBy('position')->get() as $link)
                                <li wire:key="link-{{ $link->id }}" wire:sortable-group.item="{{ $link->id }}" class="relative pr-6 mb-2 group">
                                    <a class="text-{{ $theme->color }} hover:text-sky-800" href="{{ $link->link }}" target="_blank">
                                        @if ($link->icon === 'icon-new')
                                            <x-label-new />
                                        @elseif ($link->icon === 'icon-tip')
                                            <x-label-tip />
                                        @endif
                                        {{ $link->name }}
                                    </a>
                                    <div class="absolute top-0 right-0 z-50 hidden group-hover:block">
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
