<x-app-layout>
    <div class="mb-6 md:mb-12">
        <x-slot name="header">
            <h1 class="text-xl font-semibold leading-tight text-white">
                {{ __('dashboard._') }}
            </h1>
        </x-slot>
    </div>

    <div class="mb-8 md:mb-16">
        <div class="px-4 mx-auto max-w-7xl">
            <x-jet-welcome />
        </div>
    </div>

    @can('stats read')
    <div class="px-4 mx-auto max-w-7xl">
        @livewire('admin.components.stats')
    </div>
    @endcan
</x-app-layout>
