<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
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

        $user = Auth::user();

        if (!$user->hasRole('super-admin')) {
            $sites = Site::orderBy('name', 'asc')
                ->where('name', 'like', '%'.$this->search.'%')
                ->where('user_id', $user->id)
                ->paginate(config('app.pagination'));
        } else {
            $sites = Site::orderBy('name', 'asc')
                ->where('name', 'like', '%'.$this->search.'%')
                ->paginate(config('app.pagination'));
        }

        return view('livewire.admin.sites.index', compact('sites'));
    }
}
