<div class="grid gap-4 md:gap-8 md:grid-cols-2">
    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="mb-2 md:text-xl md:mb-4">{{ __('dashboard.stats.most-visited-pages', ['days' => '90']) }}</h2>
        <ul class="text-sky-900">
            @foreach($statistics['pages'] as $stat)
            <li class="flex justify-between px-2 py-1 text-sm border-b border-sky-100 even:bg-sky-50">
                {{ $stat['url'] }}<span class="pull-right"> {{ $stat['pageViews'] }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="mb-2 md:text-xl md:mb-4">{{ __('dashboard.stats.referrers', ['days' => '90']) }}</h2>
        <ul class="text-sky-900">
            @foreach($statistics['referrers'] as $stat)
            <li class="flex justify-between px-2 py-1 text-sm border-b border-sky-100 even:bg-sky-50">
                {{ $stat['url'] }}<span class="pull-right"> {{ $stat['pageViews'] }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="mb-2 md:text-xl md:mb-4">{{ __('dashboard.stats.total-visits') }}</h2>
        <div class="text-6xl font-semibold text-sky-900">{{ $statistics['total_visits'] }}</div>
    </div>
</div>
