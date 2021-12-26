<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('users._singular') . ' - ' . $user->name  }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex justify-start mb-8">
                <x-button-link href="{{ route('admin.users.index') }}">
                    {{ __('general.back') }}
                </x-button-link>
            </div>

            <div class="mb-8 overflow-hidden bg-white border-b rounded-md shadow border-secondary-400">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

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
                            <label class="block mb-3 cursor-pointer" for="name">Naam</label>
                            <input id="name" name="name" type="text" value="{{ $user->name }}" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-8">
                            <label class="block mb-3 cursor-pointer" for="email">E-mail</label>
                            <input id="email" name="email" type="email" value="{{ $user->email }}" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
</x-app-layout>
