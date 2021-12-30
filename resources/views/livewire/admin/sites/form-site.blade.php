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

    <div class="grid grid-cols-4 gap-4">
        @foreach ($blocks as $block)
            <div class="flex items-center justify-between p-4 font-semibold group rounded-t-md bg-secondary-400">
                <span>{{ $block->name }}</span>
                <div class="flex items-center">
                    @can('sites update')
                        <div>
                            <livewire:admin.sites.modal-edit-block :block="$block" :key="time().$site_id" />
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
        @endforeach
    </div>
</div>
