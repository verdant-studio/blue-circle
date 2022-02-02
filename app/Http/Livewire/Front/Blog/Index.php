<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Article;
use App\Models\Blog;
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

        $blog = Blog::first();

        return view('livewire.front.blog.index', compact('articles', 'blog'))->layout('layouts.front');
    }
}
