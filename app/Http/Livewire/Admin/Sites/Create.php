<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Category;
use App\Models\Site;
use App\Models\Theme;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

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
        $this->authorize('sites create');

        $validatedData = $this->validate();

        $data = new Site();
        $data->category_id = $validatedData['category'];
        $data->theme_id = Theme::where('name', 'Sky')->first()->id;
        $data->description = $validatedData['description'] ?? '';
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-added', ['site' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('sites create');

        $categories = Category::orderBy('name')->get();

        return view('livewire.admin.sites.create', compact('categories'));
    }
}
