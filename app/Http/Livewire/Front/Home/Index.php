<?php

namespace App\Http\Livewire\Front\Home;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name')->get();
        $settings = Setting::first();
        $siteDescription = $settings->siteDescription ?? null;

        return view('livewire.front.home.index', compact('categories', 'siteDescription'))->layout('layouts.front');
    }
}
