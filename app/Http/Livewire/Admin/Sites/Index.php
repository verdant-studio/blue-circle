<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Site;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-deleted', ['site' => $site->name])]);
    }

    public function render()
    {
        $sites = Site::orderBy('created_at', 'asc')->where('name', 'like', '%'.$this->search.'%')->paginate(2);

        return view('livewire.admin.sites.index', compact('sites'));
    }
}
