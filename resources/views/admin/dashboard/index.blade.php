<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold leading-tight text-white">
            {{ __('dashboard._') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    @can('stats read')
        @livewire('admin.components.stats')
    @endcan
</x-app-layout>
