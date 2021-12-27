<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditSites extends Component
{
    public $selectedTab = 'site';

    public function selectTab($tab)
    {
        $this->emit('selectTab', $tab);
    }

    public function render()
    {
        return view('livewire.edit-sites');
    }
}
