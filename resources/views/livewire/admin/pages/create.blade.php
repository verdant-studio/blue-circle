<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('pages._singular') . ' - ' . __('general.add-new') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="px-4 mx-auto max-w-7xl">

        <div class="flex justify-start mb-8">
            <x-button-link href="{{ route('admin.pages.index') }}" outline>
                {{ __('general.back') }}
            </x-button-link>
        </div>

        <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
            <form autocomplete="off" wire:submit.prevent="store">
                @csrf

                <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="mb-8">
                        <label class="block mb-3 cursor-pointer" for="name">{{ __('general.name') }}</label>
                        <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="name">
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mb-8">
                        <label class="block cursor-pointer" for="description">{{ __('pages.description') }}</label>
                        <p class="block mb-3 text-sm italic text-slate-700">{{ __('pages.description-max') }}</p>
                        <input id="description" name="description" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="description">
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

                    <div class="mb-8" wire:ignore>
                        <label class="block mb-3 cursor-pointer" for="content">
                            {{ __('pages.content') }}
                            <span class="text-sm italic text-slate-500">({{ __('sites.optional') }})</span>
                        </label>
                        <textarea id="editor" name="content" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="content"></textarea>
                        <x-jet-input-error for="content" class="mt-2" />
                    </div>

                    <div class="mb-8">
                        <label class="block mb-3 cursor-pointer" for="template">{{ __('pages.templates._singular') }}</label>
                        <select class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="template" name="template" wire:model="template">
                            @foreach ($templates as $template)
                                <option wire:key="{{ $template->id }}" value={{ $template->id }}>{{ __('pages.templates.'.$template->slug.'') }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="template" class="mt-2" />
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

    @section('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
        </script>
    @stop
</div>

