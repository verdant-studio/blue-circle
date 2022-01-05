<?php

namespace App\Http\Livewire\Front\Sites;

use App\Models\Site;
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

        return view('livewire.front.sites.show', compact('site'))->layout('layouts.guest');
    }
}
