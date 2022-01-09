<div>
    <button class="block hover:text-sky-700 text-slate-900" wire:click="$toggle('confirmingCreateBlockLink')">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            <span>{{ __('sites.link-add') }}</span>
        </div>
    </button>

    <x-modal wire:model="confirmingCreateBlockLink">
        <x-slot name="title">
            {{ __('sites.link-add') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-8" x-data="{}" x-on:confirming-block-link-add.window="setTimeout(() => $refs.name.focus(), 250)">

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>
                    <x-jet-input
                        type="text"
                        class="block w-full"
                        placeholder="{{ __('sites.name') }}"
                        x-ref="name"
                        wire:model.defer="name"
                        wire:keydown.enter="store"
                    />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="link">{{ __('sites.link') }}</label>
                    <x-jet-input
                        type="text"
                        class="block w-full"
                        placeholder="{{ __('sites.link') }}"
                        x-ref="link"
                        wire:model.defer="link"
                        wire:keydown.enter="store"
                    />
                    <x-jet-input-error for="link" class="mt-2" />
                </div>

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="icon">{{ __('sites.icons._singular') }}</label>
                    <select autofocus class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="icon" name="icon" required wire:model.defer="icon">
                        <option value="icon-none">{{ __('sites.icons.icon-none') }}</option>
                        <option value="icon-new">{{ __('sites.icons.icon-new') }}</option>
                        <option value="icon-tip">{{ __('sites.icons.icon-tip') }}</option>
                    </select>
                    <x-jet-input-error for="icon" class="mt-2" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('confirmingCreateBlockLink')" wire:loading.attr="disabled">
                {{ __('general.cancel') }}
            </x-button>

            <x-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                {{ __('general.add') }}
            </x-button>
        </x-slot>
    </x-modal>
</div>
