<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use App\Models\PageTemplate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $description;

    public $content;

    public $hideMainMenu;

    public $name;

    public $page;

    public $template;

    protected function rules()
    {
        return [
            'content' => 'nullable|string',
            'description' => 'required|max:160',
            'hideMainMenu' => 'nullable|boolean',
            'name' => 'required|max:255|unique:pages,name,' . $this->page->id,
            'template' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $page = Page::findOrFail($id);

        if ($page) {
            $this->page = $page;
            $this->name = $page->name;
            $this->description = $page->description;
            $this->content = $page->content;
            $this->hideMainMenu = $page->hideMainMenu;
            $this->template = $page->template_id;
        }
    }

    public function update()
    {
        $this->authorize('pages update');

        $validatedData = $this->validate();

        $data = Page::findOrFail($this->page->id);
        $data->content = $validatedData['content'];
        $data->description = $validatedData['description'];
        $data->name = $validatedData['name'];
        $data->hideMainMenu = $validatedData['hideMainMenu'] ?? false;
        $data->template_id = $validatedData['template'] ?? PageTemplate::first()->id;
        $data->save();

        return redirect()->route('admin.pages.edit', $this->page->id)->with(['success' => __('pages.message.success-page-updated', ['page' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('pages update');

        $templates = PageTemplate::all();

        return view('livewire.admin.pages.edit', compact('templates'));
    }
}
