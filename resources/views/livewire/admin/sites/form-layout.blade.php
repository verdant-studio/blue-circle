<div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
    <form autocomplete="off" wire:submit.prevent="update">
        @csrf

        <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
            @if ($errors->any())
                <x-message-error>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-message-error>
            @endif

            <div class="mb-8 md:w-3/4">
                <label class="block font-normal cursor-pointer" for="intro">
                    {{ __('sites.intro') }}
                    <span class="text-sm italic text-slate-500">({{ __('sites.optional') }})</span>
                </label>
                <p class="block mb-3 text-sm italic text-slate-700">{{ __('sites.intro-description') }}</p>
                <x-textarea
                class="block w-full"
                rows="5"
                value="{{ $site->intro }}"
                wire:model.defer="intro"
                x-ref="intro" />
                <x-jet-input-error for="intro" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-slate-100 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
            <x-button>
                {{ __('general.save') }}
            </x-button>
        </div>
    </form>
</div>
