<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormLayout extends Component
{
    use AuthorizesRequests;

    public $site_id;

    public $intro;

    protected function rules()
    {
        return [
            'intro' => 'max:1000',
        ];
    }

    public function mount()
    {
        $data = Site::findOrFail($this->site_id);

        $this->intro = $data->intro;
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
        $data->intro = $validatedData['intro'];
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-updated', ['site' => $data->name])]);
    }

    public function render()
    {
        $this->authorize('sites update');

        $site = Site::findOrFail($this->site_id);

        return view('livewire.admin.sites.form-layout', compact('site'));
    }
}
