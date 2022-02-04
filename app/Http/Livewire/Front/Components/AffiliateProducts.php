<?php

namespace App\Http\Livewire\Front\Components;

use App\Models\Article;
use App\Models\Site;
use Livewire\Component;

class AffiliateProducts extends Component
{
    public $site;

    public $theme;

    public function render()
    {
        $articles = Article::where('category_id', $this->site->category_id)->orderBy('created_at', 'desc')->take(4)->get();
        $products = Site::getSearchProducts($this->site->name, 4);

        return view('livewire.front.components.affiliate-products', compact('articles', 'products'));
    }
}
