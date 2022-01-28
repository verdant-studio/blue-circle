<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function render()
    {
        $articles = Article::orderBy('created_at', 'desc')
                ->paginate(config('app.pagination'));

        return view('livewire.front.blog.index', compact('articles'))->layout('layouts.front');
    }
}
