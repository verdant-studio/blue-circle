<div>
    <div class="tab-pane statistic-tabs active" id="pages">
        <ul class="item-list">
            @foreach($statistics['pages'] as $p)
            <li>
                {{ $p['url'] }}<span class="pull-right"> {{ $p['pageViews'] }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>
