<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\BlockLink;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModalCreateBlockLink extends Component
{
    use AuthorizesRequests;

    public $name;

    public $icon = 'icon-none';

    public $link;

    public $block_id;

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'link' => 'required|url',
            'icon' => 'string',
        ];
    }

    public $confirmingCreateBlockLink = false;

    public function confirmCreateBlockLink()
    {
        $this->resetErrorBag();

        $this->name = '';

        $this->dispatchBrowserEvent('confirming-block-link-add');

        $this->confirmingCreateBlock = true;
    }

    public function store()
    {
        $this->authorize('sites update');

        $this->resetErrorBag();

        $validatedData = $this->validate();

        $position = BlockLink::all()->max('position') + 1;

        $block = new BlockLink();
        $block->name = $validatedData['name'];
        $block->link = $validatedData['link'];
        $block->icon = $validatedData['icon'] ?? 'icon-none';
        $block->block_id = $this->block_id;
        $block->position = $position;
        $block->save();

        $this->emitTo('admin.sites.form-site', 'refreshComponent');

        return $this->confirmingCreateBlockLink = false;
    }

    public function render()
    {
        return view('livewire.admin.sites.modal-create-block-link');
    }
}
