<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Block;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalEditBlock extends Component
{
    use AuthorizesRequests;

    public $name;

    public $content;

    public $block;

    public $confirmingUpdateBlock = false;

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'content' => 'max:300',
        ];
    }

    public function mount()
    {
        $this->name = $this->block->name;
        $this->content = $this->block->content;
    }

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
        $block->content = $validatedData['content'];
        $block->update();

        $this->emitTo('admin.sites.form-site', 'refreshComponent');

        return $this->confirmingUpdateBlock = false;
    }

    public function destroy($id)
    {
        $this->authorize('sites delete');

        $item = Block::findOrFail($id);

        Block::where('position', '>', $item->position)->update(['position' => DB::raw('position - 1')]);

        $item->delete();

        $this->emitTo('admin.sites.form-site', 'refreshComponent');
        return $this->emitTo('admin.sites.form-site', 'message', __('sites.message.success-block-deleted', ['block' => $this->name]));
    }


    public function render()
    {
        return view('livewire.admin.sites.modal-edit-block');
    }
}
