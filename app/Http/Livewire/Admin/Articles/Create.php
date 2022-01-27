<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

    public $name;

    public $description;

    public $content;

    public $category;

    protected $rules = [
        'name' => 'required|unique:articles|max:255',
        'description' => 'max:160|required',
        'category' => 'required',
    ];

    public function mount()
    {
        // set a default option
        $data = Category::first();

        if ($data) {
            $this->category = $data->id;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->authorize('articles create');

        $validatedData = $this->validate();

        $data = new Article();
        $data->category_id = $validatedData['category'];
        $data->description = $validatedData['description'] ?? '';
        $data->content = $validatedData['content'] ?? '';
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()->route('admin.blog.index')->with(['success' => __('blog.message.success-article-added', ['article' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('articles create');

        $categories = Category::orderBy('name')->get();

        return view('livewire.admin.articles.create', compact('categories'));
    }
}
