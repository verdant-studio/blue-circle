<div>
    <button class="hidden group-hover:block hover:text-primary-900 text-primary-500" wire:click="$toggle('confirmingUpdateBlock')">
        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
        <span class="sr-only">{{ __('sites.edit') }}</span>
    </button>

    <x-modal wire:model="confirmingUpdateBlock">
        <x-slot name="title">
            {{ __('sites.block-update') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-8" x-data="{}" x-on:confirming-block-update.window="setTimeout(() => $refs.name.focus(), 250)">
                <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>

                <x-jet-input type="text"
                class="block w-3/4 mt-1"
                placeholder="{{ __('sites.name') }}"
                x-ref="name"
                wire:model.defer="name"
                wire:keydown.enter="update({{$block->id}})" />

                <x-jet-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingUpdateBlock')" wire:loading.attr="disabled">
                {{ __('general.cancel') }}
            </x-button>

            <x-button class="ml-2" wire:click="update({{$block->id}})" wire:loading.attr="disabled">
                {{ __('general.update') }}
            </x-button>
        </x-slot>
    </x-modal>
</div>
