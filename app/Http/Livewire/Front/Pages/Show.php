<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Block;
use App\Models\Page;
use App\Models\PageTemplate;
use App\Models\Site;
use App\Models\Theme;
use Livewire\Component;

class Show extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $site = Site::where('slug', $this->slug)->first();
        $page = Page::where('slug', $this->slug)->first();

        if ($site) {
            $blocks = Block::where('site_id', $site->id)->orderBy('position')->get();
            $theme = Theme::where('id', $site->theme_id)->first();

            $products = Site::getSearchProducts($site->name, 5);

            return view('livewire.front.sites.show', compact('site', 'blocks', 'products', 'theme'))->layout('layouts.front');
        }

        if ($page) {
            $template = PageTemplate::where('id', $page->template_id)->first();

            return view('livewire.front.pages.show', compact('page', 'template'))->layout('layouts.front');
        }

        return abort(404);
    }
}
