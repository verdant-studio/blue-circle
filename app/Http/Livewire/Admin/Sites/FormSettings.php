<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormSettings extends Component
{
    use AuthorizesRequests;

    public $site_id;

    public $category;

    public $description;

    public $name;

    protected function rules()
    {
        return [
            'name' => 'required|max:255|unique:sites,name,' . $this->site_id,
            'description' => 'max:160',
            'category' => 'required',
        ];
    }

    public function mount()
    {
        $data = Site::findOrFail($this->site_id);

        $this->category = $data->category_id;
        $this->description = $data->description;
        $this->name = $data->name;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->authorize('sites update');

        $validatedData = $this->validate();

        $data = Site::findOrFail($this->site_id);
        $data->category_id = $validatedData['category'];
        $data->description = $validatedData['description'];
        $data->name = $validatedData['name'];
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->route('admin.sites.edit', $this->site_id)->with(['success' => __('sites.message.success-site-updated', ['site' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('sites update');

        $categories = Category::all();
        $site = Site::findOrFail($this->site_id);

        return view('livewire.admin.sites.form-settings', compact('categories', 'site'));
    }
}
