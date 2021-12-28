<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $category;

    protected $rules = [
        'name' => 'required|unique:sites|max:255',
        'description' => 'max:160',
        'category' => 'required',
    ];

    public function mount()
    {
        // set a default option
        $data = Category::first();

        $this->category = $data->id;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        $data = new Site();
        $data->category_id = $validatedData['category'];
        $data->description = $validatedData['description'] ?? '';
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-added', ['site' => $data->name])]);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.sites.create', compact('categories'));
    }
}
