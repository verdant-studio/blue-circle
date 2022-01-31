<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public $description;

    protected function rules()
    {
        return [
            'description' => 'nullable|max:160',
        ];
    }

    public function mount()
    {
        $data = Blog::first();

        $this->description = $data->description ?? null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->authorize('blog update');

        $validatedData = $this->validate();

        $blog = Blog::updateOrCreate(
            ['id' => 1],
        );

        $blog->description = $validatedData['description'];
        $blog->save();

        return redirect()->route('admin.blog.index')->with(['success' => __('blog.message.success-blog-updated')]);
    }

    public function render()
    {
        $this->authorize('blog read');

        $blog = Blog::first();

        return view('livewire.admin.blog.edit', compact('blog'));
    }
}
