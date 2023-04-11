<?php

namespace App\Http\Livewire\Backend\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.blogs.create');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|string|min:5|unique:blogs,title',
            'image' => 'nullable|image',
        ]);

        $blog = new Blog();
        $blog->title = $data['title'];
        $path = 'blogs/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('blogs', [
                'disk' => 'content_managment',
            ]);
        }
        $blog->image = $path;

        $this->showSuccess = $blog->save();
        if ($this->showSuccess) {
            $this->resetModels();
        }
    }

    // Reset models
    protected function resetModels()
    {
        $this->title = '';
        $this->image = '';
    }
}
