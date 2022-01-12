<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Site;
use Livewire\Component;

class AffiliateProducts extends Component
{
    public $site;

    public function render()
    {
        $products = Site::getSearchProducts($this->site->name, 5);

        return view('livewire.front.components.affiliate-products', compact('products'));
    }
}
