<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-800 cursor-pointer" for="name">Naam</label>
                    <input id="name" name="name" type="text" value="{{ $user->name }}" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-800 cursor-pointer" for="email">E-mail</label>
                    <input id="email" name="email" type="email" value="{{ $user->email }}" class="block w-full mt-2 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <input type="submit" value="Submit" class="inline-flex justify-center px-4 py-3 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:bg-primary-700" />
            </form>

        </div>
    </div>
</x-app-layout>
