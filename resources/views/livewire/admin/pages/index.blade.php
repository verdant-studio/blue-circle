<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-white">
        {{ __('pages._plural') }}
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
            @can('pages create')
                <x-button-link href="{{ route('admin.pages.create') }}">
                    {{ __('general.add-new') }}
                </x-button-link>
            @endcan
        </div>

        <div class="mb-8 overflow-hidden border-b rounded-md shadow border-slate-300">
            <table class="min-w-full divide-y divide-slate-300">
                <thead class="text-white bg-sky-600">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.name') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.created-at') }}</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase" scope="col">{{ __('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody wire:sortable="updatePageOrder" class="bg-white divide-y divide-slate-300">
                @foreach ($pages as $page)
                    <tr wire:sortable.item="{{ $page->id }}" wire:key="page-{{ $page->id }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $page->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ Carbon\Carbon::parse($page->created_at)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 align-middle whitespace-nowrap">
                            @can('pages update')
                                <button wire:sortable.handle class="inline-block align-middle cursor-move text-stone-900 hover:text-stone-600">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 9-3 3 3 3M9 5l3-3 3 3M15 19l-3 3-3-3M19 9l3 3-3 3M2 12h20M12 2v20"/></svg>
                                    <span class="sr-only">{{ __('general.move') }}</span>
                                </button>
                            @endcan

                            @can('pages update')
                                <a class="inline-block text-green-700 align-middle hover:text-green-900" href="{{ route('admin.pages.edit', ['id' => $page->id]) }}">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span class="sr-only">{{ __('general.edit') }}</span>
                                </a>
                            @endcan

                            @can('pages delete')
                                <button class="inline-block text-red-600 align-middle hover:text-red-900" wire:click="destroy({{$page->id}})">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="sr-only">{{ __('general.delete') }}</span>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

