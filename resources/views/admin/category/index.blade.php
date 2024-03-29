<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-white">
            {{ __('categories._plural') }}
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

            <div class="flex justify-end mb-8">
                @can('categories create')
                    <x-button-link href="{{ route('admin.categories.create') }}">
                        {{ __('general.add-new') }}
                    </x-button-link>
                @endcan
            </div>

            <div class="mb-8 overflow-hidden border-b rounded-md shadow border-slate-300">
                <table class="min-w-full divide-y divide-slate-300">
                    <thead class="text-white bg-sky-600">
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.name') }}</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('categories.sites-amount') }}</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.created-at') }}</th>
                            <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-slate-300">
                    @foreach ($categories as $category)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ count($category->sites) }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ Carbon\Carbon::parse($category->created_at)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @can('categories update')
                                <a class="inline-block text-green-700 hover:text-green-900" href="{{ route('admin.categories.edit', ['category' => $category]) }}">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span class="sr-only">{{ __('general.edit') }}</span>
                                </a>
                            @endcan

                            @can('categories delete')
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ __('general.are-you-sure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button class="inline-block text-red-600 hover:text-red-900" type="submit">
                                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="sr-only">{{ __('general.delete') }}</span>
                                    </button>
                                </form>
                            @endcan
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
