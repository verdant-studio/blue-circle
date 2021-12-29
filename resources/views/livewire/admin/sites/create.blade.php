<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('sites._singular') . ' - ' . __('general.add-new') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="flex justify-start mb-8">
            <x-button-link href="{{ route('admin.sites.index') }}">
                {{ __('general.back') }}
            </x-button-link>
        </div>

        <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-secondary-400">
            <form autocomplete="off" wire:submit.prevent="store">
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

                    <div class="mb-8">
                        <label class="block mb-3 cursor-pointer" for="name">{{ __('sites.name') }}</label>
                        <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required wire:model="name">
                    </div>

                    <div class="mb-8">
                        <label class="block cursor-pointer" for="description">{{ __('sites.description') }}</label>
                        <p class="block mb-3 text-sm italic text-secondary-900">{{ __('sites.description-max') }}</p>
                        <input id="description" name="description" type="text" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="description">
                    </div>

                    <div class="mb-8">
                        <label class="block mb-3 cursor-pointer" for="category">{{ __('sites.category') }}</label>
                        <select autofocus class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="category" name="category" wire:model.defer="category">
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-secondary-400 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <x-button>
                        {{ __('general.save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>

