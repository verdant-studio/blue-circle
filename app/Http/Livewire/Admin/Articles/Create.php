<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $category;

    public $content;

    public $description;

    public $name;

    public $photo;

    protected $rules = [
        'category' => 'required',
        'content' => 'nullable|string',
        'description' => 'max:160|required',
        'name' => 'required|unique:articles|max:255',
        'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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

        $photo = $this->photo->storePublicly('blog', ['disk' => 'public']);

        $data = new Article();
        $data->category_id = $validatedData['category'];
        $data->content = $validatedData['content'] ?? '';
        $data->description = $validatedData['description'] ?? '';
        $data->name = $validatedData['name'];
        $data->photo = $photo ?? '';
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()->route('admin.blog.index')->with(['success' => __('articles.message.success-article-added', ['article' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('articles create');

        $categories = Category::orderBy('name')->get();

        return view('livewire.admin.articles.create', compact('categories'));
    }
}
