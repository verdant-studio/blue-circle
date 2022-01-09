<?php

namespace App\Http\Livewire\Admin\Sites;

use App\Models\Block;
use App\Models\BlockLink;
use App\Models\Site;
use App\Models\Theme;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class FormSite extends Component
{
    use AuthorizesRequests;

    public $site_id;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'message' => 'showMessage'
    ];

    public function showMessage($message)
    {
        return session()->flash('success', $message);
    }

    public function updateBlockOrder($blocks)
    {
        foreach ($blocks as $block) {
            Block::find($block['value'])->update(['position' => $block['order']]);
        }
    }

    public function updateLinkOrder($links)
    {
        foreach ($links as $link) {
            foreach ($link['items'] as $item) {
                $blockLink = BlockLink::findOrFail($item['value']);

                $blockLink->update([
                    'block_id' => $link['value'],
                    'position' => $item['order']
                ]);
            }
        }
    }

    public function render()
    {
        $this->authorize('sites read');

        $site = Site::findOrFail($this->site_id);

        $blocks = Block::where('site_id', $this->site_id)->orderBy('position')->get();
        $theme = Theme::where('id', $site->theme_id)->first();

        return view('livewire.admin.sites.form-site', compact('blocks', 'theme'));
    }
}
