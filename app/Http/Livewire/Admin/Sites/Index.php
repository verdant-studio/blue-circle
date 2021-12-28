<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use AuthorizesRequests;
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
        $this->authorize('sites delete');

        $site = Site::findOrFail($id);
        $site->delete();

        return redirect()->route('admin.sites.index')->with(['success' => __('sites.message.success-site-deleted', ['site' => $site->name])]);
    }

    public function render()
    {
        $this->authorize('sites read');

        $sites = Site::orderBy('created_at', 'asc')->where('name', 'like', '%'.$this->search.'%')->paginate(2);

        return view('livewire.admin.sites.index', compact('sites'));
    }
}
