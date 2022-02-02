<?php

namespace App\Http\Livewire\Front\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
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
        $article = Article::where('slug', $this->slug)->first();

        if ($article) {
            return view('livewire.front.articles.show', compact('article'))->layout('layouts.front');
        }

        return abort(404);
    }
}
