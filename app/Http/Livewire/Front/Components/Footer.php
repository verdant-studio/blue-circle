<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Page;
use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $pages = Page::orderBy('position')->get();
        $settings = Setting::first();
        $siteDescription = $settings->siteDescription ?? null;

        return view('livewire.front.components.footer', compact('pages', 'siteDescription'));
    }
}
