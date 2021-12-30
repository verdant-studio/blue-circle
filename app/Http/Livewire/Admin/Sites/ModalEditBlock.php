<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Block;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ModalEditBlock extends Component
{
    use AuthorizesRequests;

    public $name;

    public $block;

    public $confirmingUpdateBlock = false;

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    // public function mount()
    // {
    //     $this->name = 'test';
    // }

    public function confirmUpdateBlock()
    {
        $this->resetErrorBag();

        $this->dispatchBrowserEvent('confirming-block-update');

        $this->confirmingUpdateBlock = true;
    }

    public function update($id)
    {
        $this->authorize('sites update');

        $validatedData = $this->validate();

        $block = Block::findOrFail($id);
        $block->name = $validatedData['name'];
        $block->update();

        $this->emitTo('admin.sites.form-site', 'refreshComponent');

        return $this->confirmingUpdateBlock = false;
    }

    public function render()
    {
        return view('livewire.admin.sites.modal-edit-block');
    }
}
