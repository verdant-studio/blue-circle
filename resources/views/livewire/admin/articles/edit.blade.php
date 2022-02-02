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
                            <label class="block mb-3 cursor-pointer" for="photo">
                                {{ __('articles.photo') }}
                            </label>
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
             class MyUploadAdapter {
                constructor( loader ) {
                    // The file loader instance to use during the upload. It sounds scary but do not
                    // worry — the loader will be passed into the adapter later on in this guide.
                    this.loader = loader;
                }
                // Starts the upload process.
                upload() {
                    return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                            this._initRequest();
                            this._initListeners( resolve, reject, file );
                            this._sendRequest( file );
                        } ) );
                }
                // Aborts the upload process.
                abort() {
                    if ( this.xhr ) {
                        this.xhr.abort();
                    }
                }
                // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();
                    // Note that your request may look different. It is up to you and your editor
                    // integration to choose the right communication channel. This example uses
                    // a POST request with JSON as a data structure but your configuration
                    // could be different.
                    xhr.open( 'POST', '{{ route('admin.images.store') }}', true );
                    xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                    xhr.responseType = 'json';
                }
                // Initializes XMLHttpRequest listeners.
                _initListeners( resolve, reject, file ) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;
                    xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                    xhr.addEventListener( 'abort', () => reject() );
                    xhr.addEventListener( 'load', () => {
                        const response = xhr.response;
                        // This example assumes the XHR server's "response" object will come with
                        // an "error" which has its own "message" that can be passed to reject()
                        // in the upload promise.
                        //
                        // Your integration may handle upload errors in a different way so make sure
                        // it is done properly. The reject() function must be called when the upload fails.
                        if ( !response || response.error ) {
                            return reject( response && response.error ? response.error.message : genericErrorText );
                        }
                        // If the upload is successful, resolve the upload promise with an object containing
                        // at least the "default" URL, pointing to the image on the server.
                        // This URL will be used to display the image in the content. Learn more in the
                        // UploadAdapter#upload documentation.
                        resolve( {
                            default: response.url
                        } );
                    } );
                    // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                    // properties which are used e.g. to display the upload progress bar in the editor
                    // user interface.
                    if ( xhr.upload ) {
                        xhr.upload.addEventListener( 'progress', evt => {
                            if ( evt.lengthComputable ) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        } );
                    }
                }
                // Prepares the data and sends the request.
                _sendRequest( file ) {
                    // Prepare the form data.
                    const data = new FormData();
                    data.append( 'upload', file );
                    // Important note: This is the right place to implement security mechanisms
                    // like authentication and CSRF protection. For instance, you can use
                    // XMLHttpRequest.setRequestHeader() to set the request headers containing
                    // the CSRF token generated earlier by your application.
                    // Send the request.
                    this.xhr.send( data );
                }
                // ...
            }
            function SimpleUploadAdapterPlugin( editor ) {
                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                    // Configure the URL to the upload script in your back-end here!
                    return new MyUploadAdapter( loader );
                };
            }

            ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [ SimpleUploadAdapterPlugin ],
            })
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

