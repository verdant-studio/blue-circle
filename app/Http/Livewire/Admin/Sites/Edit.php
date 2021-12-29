<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $site;

    public $selectedTab = 'site';

    public function mount($id)
    {
        $site = Site::findOrFail($id);

        if ($site->user_id !== Auth::user()->id) {
            abort(403);
        }

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
        $this->authorize('sites update');

        $categories = Category::all();

        return view('livewire.admin.sites.edit', compact('categories'));
    }
}
