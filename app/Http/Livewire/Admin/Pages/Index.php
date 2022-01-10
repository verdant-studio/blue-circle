<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function destroy($id)
    {
        $this->authorize('pages delete');

        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with(['success' => __('pages.message.success-page-deleted', ['page' => $page->name])]);
    }


    public function render()
    {
        $this->authorize('pages read');

        $pages = Page::orderBy('name')->paginate(config('app.pagination'));

        return view('livewire.admin.pages.index', compact('pages'));
    }
}
