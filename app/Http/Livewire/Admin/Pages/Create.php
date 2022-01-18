<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use App\Models\PageTemplate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use AuthorizesRequests;

    public $content;

    public $description;

    public $hideMainMenu;

    public $name;

    public $template;

    protected $rules = [
        'content' => 'nullable|string',
        'description' => 'required|max:160',
        'hideMainMenu' => 'nullable|boolean',
        'name' => 'required|unique:pages|max:255',
        'template' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->authorize('pages create');

        $validatedData = $this->validate();

        $position = Page::all()->max('position') + 1;

        $data = new Page();
        $data->content = $validatedData['content'];
        $data->description = $validatedData['description'];
        $data->name = $validatedData['name'];
        $data->hideMainMenu = $validatedData['hideMainMenu'] ?? false;
        $data->position = $position;
        $data->template_id = $validatedData['template'] ?? PageTemplate::first()->id;

        $data->save();

        return redirect()->route('admin.pages.index')->with(['success' => __('pages.message.success-page-added', ['page' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('pages create');

        $templates = PageTemplate::all();

        return view('livewire.admin.pages.create', compact('templates'));
    }
}
