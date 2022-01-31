<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $article;

    public $category;

    public $content;

    public $description;

    public $name;

    public $newPhoto;

    public $photo;

    protected function rules()
    {
        return [
            'category' => 'required',
            'content' => 'nullable|string',
            'description' => 'max:160|required',
            'name' => 'required|max:255|unique:articles,name,' . $this->article->id,
            'newPhoto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);

        if ($article) {
            $this->article = $article;
            $this->category = $article->category_id;
            $this->content = $article->content;
            $this->description = $article->description;
            $this->name = $article->name;
            $this->photo = $article->photo;
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

        if ($this->newPhoto) {
            $this->validate([
                'newPhoto' => 'image|mimes:jpg,jpeg,png|max:2048'
            ]);

            Storage::delete('public/' . $this->photo);

            $photo = $this->newPhoto->storePublicly('blog', ['disk' => 'public']);

            $data->photo = $photo;
        } else {
            $data->photo = $this->photo;
        }

        $data->category_id = $validatedData['category'];
        $data->content = $validatedData['content'];
        $data->description = $validatedData['description'];
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->route('admin.blog.index', $this->article->id)->with(['success' => __('articles.message.success-article-updated', ['article' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('articles update');

        $categories = Category::all();
        $articles = Article::findOrFail($this->article->id);

        return view('livewire.admin.articles.edit', compact('articles', 'categories'));
    }
}
