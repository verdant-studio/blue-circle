<div>
    <div class="mb-8">
        <x-button-link wire:click="$toggle('confirmingCreateBlock')">
            {{ __('sites.new-block-add') }}
        </x-button-link>
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
                <button class="hidden text-red-600 group-hover:block hover:text-red-900" wire:click="destroy({{$block->id}})">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span class="sr-only">{{ __('sites.delete') }}</span>
                </button>
            </div>
        @endforeach
    </div>

    <x-modal wire:model="confirmingCreateBlock">
        <x-slot name="title">
            {{ __('sites.new-block-add') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-8" x-data="{}" x-on:confirming-block-add.window="setTimeout(() => $refs.name.focus(), 250)">
                <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>

                <x-jet-input type="text" class="block w-3/4 mt-1"
                placeholder="{{ __('sites.name') }}"
                x-ref="name"
                wire:model.defer="name"
                wire:keydown.enter="store" />

                <x-jet-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingCreateBlock')" wire:loading.attr="disabled">
                {{ __('general.cancel') }}
            </x-button>

            <x-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                {{ __('general.add-new') }}
            </x-button>
        </x-slot>
    </x-modal>
</div>
