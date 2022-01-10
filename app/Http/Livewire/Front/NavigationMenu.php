<?php

namespace App\Http\Livewire\Front;

use App\Models\Page;
use Livewire\Component;

class NavigationMenu extends Component
{
    public function render()
    {
        $pages = Page::orderBy('name')->get();

        return view('livewire.front.navigation-menu', compact('pages'));
    }
}
