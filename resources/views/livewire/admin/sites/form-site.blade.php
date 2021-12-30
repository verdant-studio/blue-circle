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

                        @can('sites delete')
                            <button class="hidden text-red-600 group-hover:block hover:text-red-900" wire:click="destroy({{$block->id}})">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="sr-only">{{ __('sites.delete') }}</span>
                            </button>
                        @endcan
                    </div>
                </div>

                @can('sites update')
                    <div class="flex flex-col justify-between h-full p-4 group">
                        <ul class="flex-grow">
                            @foreach ($block->links()->get() as $link)
                                <li class="mb-2 text-tertiary-600 hover:text-tertiary-800">
                                    <a href="{{ $link->link }}" target="_blank">
                                        @if ($link->icon === 'icon-new')
                                            <span class="p-1 text-xs font-semibold text-black rounded bg-tags-new">{{ __('sites.icons.icon-new') }}</span>
                                        @elseif ($link->icon === 'icon-tip')
                                            <span class="p-1 text-xs font-semibold text-black rounded bg-tags-tip">{{ __('sites.icons.icon-tip') }}</span>
                                        @endif
                                        {{ $link->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex-none hidden mt-3 group-hover:block">
                            @livewire('admin.sites.modal-create-block-link', ['block_id' => $block->id], key($block->id))
                        </div>
                    </div>
                @endcan
            </div>
        @endforeach
    </div>
</div>
