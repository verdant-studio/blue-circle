<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Site;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-deleted', ['site' => $site->name])]);
    }

    public function render()
    {
        $sites = Site::orderBy('created_at', 'asc')->paginate(2);

        return view('livewire.admin.sites.index', compact('sites'));
    }
}
