<div>
    <button class="text-green-500 hover:text-green-900" wire:click="$toggle('confirmingUpdateBlockLink')">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
        <span class="sr-only">{{ __('general.edit') }}</span>
    </button>

    <x-modal wire:model="confirmingUpdateBlockLink">
        <x-slot name="title">
            {{ __('sites.link-update') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-8 text-slate-900" x-data="{}" x-on:confirming-block-link-update.window="setTimeout(() => $refs.name.focus(), 250)">

                <div class="mb-8 md:w-3/4">
                    <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>
                    <x-jet-input
                        type="text"
                        class="block w-full"
                        placeholder="{{ __('sites.name') }}"
                        x-ref="name"
                        wire:model.defer="name"
                        wire:keydown.enter="update"
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
                        wire:keydown.enter="update"
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
            <div class="flex flex-col space-y-2 md:space-x-2 md:space-y-0 md:flex-row md:justify-between">
                <x-jet-danger-button wire:click="destroy({{$data->id}})" wire:loading.attr="disabled">
                    {{ __('general.delete') }}
                </x-jet-danger-button>

                <div class="flex flex-col space-y-2 md:space-x-2 md:space-y-0 md:flex-row">
                    <x-jet-button wire:click="$toggle('confirmingUpdateBlockLink')" wire:loading.attr="disabled">
                        {{ __('general.cancel') }}
                    </x-jet-button>

                    <x-jet-button wire:click="update({{$data->id}})" wire:loading.attr="disabled">
                        {{ __('general.update') }}
                    </x-jet-button>
                </div>
            </div>

        </x-slot>
    </x-modal>
</div>
