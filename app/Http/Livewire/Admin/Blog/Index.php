<?php

namespace App\Http\Livewire\Admin\Blog;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public $selectedTab = 'blog-overview-tab';

    public function selectTab($tab)
    {
        $this->emit('selectTab', $tab);
    }

    public function render()
    {
        $this->authorize('blog read');

        return view('livewire.admin.blog.index');
    }
}
