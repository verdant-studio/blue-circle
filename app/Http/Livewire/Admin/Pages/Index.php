<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public function destroy($id)
    {
        $this->authorize('pages delete');

        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with(['success' => __('pages.message.success-page-deleted', ['page' => $page->name])]);
    }

    public function updatePageOrder($pages)
    {
        foreach ($pages as $page) {
            Page::find($page['value'])->update(['position' => $page['order']]);
        }
    }

    public function render()
    {
        $this->authorize('pages read');

        $pages = Page::orderBy('position')->get();

        return view('livewire.admin.pages.index', compact('pages'));
    }
}
