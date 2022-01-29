<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('articles._singular') . ' - ' . $this->name }}
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

        <div class="flex justify-start mb-8">
            <x-button-link href="{{ route('admin.blog.index') }}" outline>
                {{ __('general.back') }}
            </x-button-link>
        </div>

        <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
            <form autocomplete="off" wire:submit.prevent="update">
                @csrf

                <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="mb-8 md:w-3/4">
                        @if ($newPhoto)
                            <label class="block mb-3 cursor-pointer">
                                {{ __('articles.photo-preview') }}
                            </label>
                            <img class="h-40 mb-2" src="{{ $newPhoto->temporaryUrl() }}">
                        @else
                            <img class="h-40 mb-2" src="{{ url('storage/' . $photo) }}">
                        @endif
                        <div wire:loading wire:target="newPhoto">{{ __('general.uploading') }}</div>
                        <input id="newPhoto" name="newPhoto" type="file" wire:model="newPhoto">
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block mb-3 cursor-pointer" for="name">{{ __('articles.name') }}</label>
                        <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="name">
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block cursor-pointer" for="description">{{ __('articles.description') }}</label>
                        <p class="block mb-3 text-sm italic text-slate-700">{{ __('articles.description-max') }}</p>
                        <input id="description" name="description" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="description">
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4" wire:ignore>
                        <label class="block mb-3 cursor-pointer" for="content">
                            {{ __('articles.content') }}
                            <span class="text-sm italic text-slate-500">({{ __('general.optional') }})</span>
                        </label>
                        <textarea id="editor" name="content" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="content">{{ $content }}</textarea>
                        <x-jet-input-error for="content" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block mb-3 cursor-pointer" for="category">{{ __('articles.category') }}</label>
                        <select class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="category" name="category" required wire:model.defer="category">
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="category" class="mt-2" />
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

