<div class="text-stone-900">
    <button class="hidden text-white group-hover:block hover:text-stone-300" wire:click="$toggle('confirmingUpdateBlock')">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <div class="md:w-3/4">
                    <label class="block mb-3 font-normal cursor-pointer" for="name">{{ __('sites.name') }}</label>
                    <x-jet-input type="text"
                    class="block w-full"
                    placeholder="{{ __('sites.name') }}"
                    x-ref="name"
                    wire:model.defer="name"
                    wire:keydown.enter="update({{$block->id}})" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
            </div>

            <div x-data="{}" x-on:confirming-block-update.window="setTimeout(() => $refs.content.focus(), 250)">
                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 font-normal cursor-pointer" for="content">
                        {{ __('sites.content') }}
                        <span class="text-sm italic text-slate-500">({{ __('sites.optional') }})</span>
                    </label>
                    <x-textarea
                    class="block w-full"
                    placeholder="{{ __('sites.content') }}"
                    x-ref="content"
                    wire:model.defer="content"
                    wire:keydown.enter="update({{$block->id}})" />
                    <x-jet-input-error for="content" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col space-y-2 md:space-x-2 md:space-y-0 md:flex-row md:justify-between">
                <x-jet-danger-button wire:click="destroy({{$block->id}})" wire:loading.attr="disabled">
                    {{ __('general.delete') }}
                </x-jet-danger-button>

                <div class="flex flex-col space-y-2 md:space-x-2 md:space-y-0 md:flex-row">
                    <x-jet-button wire:click="$toggle('confirmingUpdateBlock')" wire:loading.attr="disabled">
                        {{ __('general.cancel') }}
                    </x-jet-button>
                    <x-jet-button wire:click="update({{$block->id}})" wire:loading.attr="disabled">
                        {{ __('general.update') }}
                    </x-jet-button>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
