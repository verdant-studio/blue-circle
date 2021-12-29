<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Block;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class FormSite extends Component
{
    use AuthorizesRequests;

    public $name;

    public $site_id;

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    /**
     * Indicates if block creation is confirmed.
     *
     * @var bool
     */
    public $confirmingCreateBlock = false;

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmCreateBlock()
    {
        $this->resetErrorBag();

        $this->name = '';

        $this->dispatchBrowserEvent('confirming-block-add');

        $this->confirmingCreateBlock = true;
    }

    public function store()
    {
        $this->authorize('sites create');

        $this->resetErrorBag();

        $validatedData = $this->validate();

        $data = new Block();
        $data->name = $validatedData['name'];
        $data->site_id = $this->site_id;

        $data->save();

        return $this->confirmingCreateBlock = false;
    }

    public function render()
    {
        $this->authorize('sites read');

        $blocks = Block::all()->where('site_id', $this->site_id);

        return view('livewire.admin.sites.form-site', compact('blocks'));
    }
}
