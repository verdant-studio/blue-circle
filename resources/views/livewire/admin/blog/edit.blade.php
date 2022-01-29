<div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
    <form autocomplete="off" wire:submit.prevent="update">
        @csrf

        <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
            <div class="mb-8 md:w-3/4">
                <label class="block cursor-pointer" for="description">{{ __('blog.description') }}</label>
                <p class="block mb-3 text-sm italic text-slate-700">{{ __('blog.description-max') }}</p>
                <input id="description" name="description" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="description">
                <x-jet-input-error for="description" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-slate-100 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
            <x-button>
                {{ __('general.save') }}
            </x-button>
        </div>
    </form>
</div>

