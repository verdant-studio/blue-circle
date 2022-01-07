<div>
    <x-button wire:click="$toggle('confirmingCreateBlock')">
        {{ __('sites.block-add') }}
    </x-button>

    <x-modal wire:model="confirmingCreateBlock">
        <x-slot name="title">
            {{ __('sites.block-add') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-8" x-data="{}" x-on:confirming-block-add.window="setTimeout(() => $refs.name.focus(), 250)">
                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>
                    <x-jet-input type="text"
                    class="block w-full"
                    placeholder="{{ __('sites.name') }}"
                    x-ref="name"
                    wire:model.defer="name"
                    wire:keydown.enter="store" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
            </div>

            <div x-data="{}" x-on:confirming-block-add.window="setTimeout(() => $refs.content.focus(), 250)">
                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="content">
                        {{ __('sites.content') }}
                        <span class="text-sm italic text-slate-500">({{ __('sites.optional') }})</span>
                    </label>
                    <x-textarea
                    class="block w-full"
                    placeholder="{{ __('sites.content') }}"
                    x-ref="content"
                    wire:model.defer="content"
                    wire:keydown.enter="store" />
                    <x-jet-input-error for="content" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingCreateBlock')" wire:loading.attr="disabled">
                {{ __('general.cancel') }}
            </x-button>

            <x-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                {{ __('general.add') }}
            </x-button>
        </x-slot>
    </x-modal>
</div>
