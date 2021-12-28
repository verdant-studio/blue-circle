<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Category;
use App\Models\Site;

use Livewire\Component;

class Edit extends Component
{
    public $site;

    public $selectedTab = 'site';

    public function mount($id)
    {
        $site = Site::findOrFail($id);

        if ($site) {
            $this->site = $site;
        }
    }

    public function selectTab($tab)
    {
        $this->emit('selectTab', $tab);
    }


    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.sites.edit', compact('categories'));
    }
}
