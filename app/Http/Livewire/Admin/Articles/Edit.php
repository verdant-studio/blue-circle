<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $article;

    public $category;

    public $content;

    public $description;

    public $name;

    protected function rules()
    {
        return [
            'name' => 'required|max:255|unique:articles,name,' . $this->article->id,
            'description' => 'max:160|required',
            'category' => 'required',
            'content' => 'nullable|string',
        ];
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);

        if ($article) {
            $this->article = $article;
            $this->name = $article->name;
            $this->description = $article->description;
            $this->content = $article->content;
            $this->category = $article->category_id;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->authorize('articles update');

        $validatedData = $this->validate();

        $data = Article::findOrFail($this->article->id);
        $data->category_id = $validatedData['category'];
        $data->content = $validatedData['content'];
        $data->description = $validatedData['description'];
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->route('admin.blog.index', $this->article->id)->with(['success' => __('blog.message.success-article-updated', ['article' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('articles update');

        $categories = Category::all();
        $articles = Article::findOrFail($this->article->id);

        return view('livewire.admin.articles.edit', compact('articles', 'categories'));
    }
}
