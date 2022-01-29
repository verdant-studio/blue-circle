<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Article;
use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $search;

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy($id)
    {
        $this->authorize('articles delete');

        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.blog.index')->with(['success' => __('blog.message.success-article-deleted', ['article' => $article->name])]);
    }

    public function render()
    {
        $this->authorize('blog read');

        $articles = Article::orderBy('created_at', 'desc')
                ->where('name', 'like', '%'.$this->search.'%')
                ->paginate(config('app.pagination'));

        return view('livewire.admin.blog.index', compact('articles'));
    }
}
