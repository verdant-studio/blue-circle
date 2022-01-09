<?php

namespace App\Http\Livewire\Front\Home;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name')->get();

        return view('livewire.front.home.index', compact('categories'))->layout('layouts.front');
    }
}
