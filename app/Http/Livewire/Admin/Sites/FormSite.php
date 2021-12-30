<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Block;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class FormSite extends Component
{
    use AuthorizesRequests;

    public $site_id;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function destroy($id)
    {
        $this->authorize('sites delete');

        $block = Block::findOrFail($id);
        $block->delete();

        return session()->flash('success', __('sites.message.success-block-deleted', ['block' => $block->name]));
    }

    public function render()
    {
        $this->authorize('sites read');

        $blocks = Block::all()->where('site_id', $this->site_id);

        return view('livewire.admin.sites.form-site', compact('blocks'));
    }
}
