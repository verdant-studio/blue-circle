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

    <div class="tab-pane statistic-tabs active" id="pages">
        <ul class="item-list">
            @foreach($statistics['pages'] as $p)
            <li>
                {{ $p['url'] }}<span class="pull-right"> {{ $p['pageViews'] }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
