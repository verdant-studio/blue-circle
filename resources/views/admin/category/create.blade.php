<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-white">
            {{ __('categories._singular') . ' - ' . __('general.add-new') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4">

            <div class="flex justify-start mb-8">
                <x-button-link href="{{ route('admin.categories.index') }}" outline>
                    {{ __('general.back') }}
                </x-button-link>
            </div>

            <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-slate-300">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    @method('POST')

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
                            <label class="block mb-3 cursor-pointer" for="name">{{ __('categories.name') }}</label>
                            <input id="name" name="name" type="text" class="block w-full mt-2 rounded-md shadow-sm border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
</x-app-layout>
