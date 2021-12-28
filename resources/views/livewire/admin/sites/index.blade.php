<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('sites._plural') }}
    </h1>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        @if (session('success'))
            <x-message-success>{{ session('success') }}</x-message-success>
        @endif

        @if (session('error'))
            <x-message-error>{{ session('error') }}</x-message-error>
        @endif

        <div class="flex justify-end mb-8">
            @can('sites create')
                <x-button-link href="{{ route('admin.sites.create') }}">
                    {{ __('general.add-new') }}
                </x-button-link>
            @endcan
        </div>

        <div class="flex justify-end">
            <input class="block w-full max-w-md mt-2 mb-8 rounded-md shadow-sm border-secondary-400 focus:border-indigo-500 focus:ring-indigo-500" placeholder="{{ __('general.search') }}" type="text" wire:model="search">
        </div>

        <div class="mb-8 overflow-hidden border-b rounded-md shadow border-secondary-400">
            <table class="min-w-full divide-y divide-secondary-400">
                <thead class="bg-secondary-400">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('sites.name') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('sites.category') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('sites.owner') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('sites.created-at') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('sites.actions') }}</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-secondary-400">
                @foreach ($sites as $site)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $site->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($site->category)
                                {{ $site->category->name }}
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $site->user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $site->created_at->format('j F, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @can('sites update')
                                <a class="inline-block hover:text-primary-900 text-primary-500" href="{{ route('admin.sites.edit', ['id' => $site->id]) }}">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span class="sr-only">{{ __('sites.edit') }}</span>
                                </a>
                            @endcan

                            @can('sites delete')
                                <button class="inline-block text-red-600 hover:text-red-900" wire:click="destroy({{$site->id}})">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="sr-only">{{ __('sites.delete') }}</span>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $sites->links() }}
    </div>
</div>

