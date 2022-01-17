<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('settings._plural') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="px-4 mx-auto max-w-7xl">

        @if (session('success'))
            <x-message-success>{{ session('success') }}</x-message-success>
        @endif

        @if (session('error'))
            <x-message-error>{{ session('error') }}</x-message-error>
        @endif

        <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
            <form autocomplete="off" wire:submit.prevent="update">
                @csrf

                <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="mb-8 md:w-3/4">
                        <label class="block cursor-pointer" for="siteDescription">
                            {{ __('settings.site-description') }}
                        </label>
                        <p class="block mb-3 text-sm italic text-slate-700">{{ __('settings.site-description-max') }}</p>
                        <x-textarea
                        class="block w-full"
                        x-ref="siteDescription"
                        wire:model.defer="siteDescription" />
                        <x-jet-input-error for="siteDescription" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block mb-3 cursor-pointer" for="google_analytics_id">
                            {{ __('settings.google-analytics-id') }}
                            <span class="text-sm italic text-slate-500">
                                ({{ __('general.optional') }})
                            </span>
                        </label>
                        <input id="google_analytics_id" name="google_analytics_id" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="google_analytics_id">
                        <x-jet-input-error for="google_analytics_id" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block cursor-pointer" for="bol_com_api_key">
                            {{ __('settings.bol-com-api-key') }}
                            <span class="text-sm italic text-slate-500">
                                ({{ __('general.optional') }})
                            </span>
                        </label>
                        <input id="bol_com_api_key" name="bol_com_api_key" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="bol_com_api_key">
                        <x-jet-input-error for="bol_com_api_key" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-slate-100 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <x-button>
                        {{ __('general.save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>

