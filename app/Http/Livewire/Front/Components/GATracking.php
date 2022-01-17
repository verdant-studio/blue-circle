<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Setting;
use Livewire\Component;

class GATracking extends Component
{
    public function render()
    {
        $settings = Setting::first();
        $googleAnalyticsId = $settings->google_analytics_id ?? null;

        return view('livewire.front.components.g-a-tracking', compact('googleAnalyticsId'));
    }
}
