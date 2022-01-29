<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('articles._singular') . ' - ' . __('general.add-new') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="px-4 mx-auto max-w-7xl">

        <div class="flex justify-start mb-8">
            <x-button-link href="{{ route('admin.blog.index') }}" outline>
                {{ __('general.back') }}
            </x-button-link>
        </div>

        <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
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

                    <div class="mb-8 md:w-3/4">
                        @if ($photo)
                            <label class="block mb-3 cursor-pointer" for="photo">
                                {{ __('articles.photo-preview') }}
                            </label>
                            <img class="h-40 mb-2" src="{{ $photo->temporaryUrl() }}">
                        @endif

                        <div wire:loading wire:target="photo">{{ __('general.uploading') }}</div>
                        <input id="photo" name="photo" type="file" wire:model="photo">
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block mb-3 cursor-pointer" for="name">{{ __('articles.name') }}</label>
                        <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required wire:model="name">
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block cursor-pointer" for="description">{{ __('articles.description') }}</label>
                        <p class="block mb-3 text-sm italic text-slate-700">{{ __('articles.description-max') }}</p>
                        <input id="description" name="description" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model="description">
                    </div>

                    <div class="mb-8 md:w-3/4" wire:ignore>
                        <label class="block mb-3 cursor-pointer" for="content">
                            {{ __('articles.content') }}
                            <span class="text-sm italic text-slate-500">({{ __('general.optional') }})</span>
                        </label>
                        <textarea id="content" name="content" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" wire:model.defer="content" x-data x-init="ClassicEditor
                        .create( $refs.content ).then(function(editor){
                            editor.model.document.on('change:data',()=>{
                                @this.set('content',editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );"
                        x-ref="content"></textarea>
                        <x-jet-input-error for="content" class="mt-2" />
                    </div>

                    <div class="mb-8 md:w-3/4">
                        <label class="block mb-3 cursor-pointer" for="category">{{ __('articles.category') }}</label>
                        <select autofocus class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" id="category" name="category" wire:model.defer="category">
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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
    @stop
</div>

