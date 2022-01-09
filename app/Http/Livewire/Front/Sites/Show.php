<?php

namespace App\Http\Livewire\Front\Sites;

use App\Models\Block;
use App\Models\Site;
use App\Models\Theme;
use Livewire\Component;

class Show extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $site = Site::where('slug', $this->slug)->firstOrFail();
        $blocks = Block::where('site_id', $site->id)->orderBy('position')->get();
        $theme = Theme::where('id', $site->theme_id)->first();

        return view('livewire.front.sites.show', compact('site', 'blocks', 'theme'))->layout('layouts.front');
    }
}
