<?php

namespace App\Http\Livewire\Backend\Blogs;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $blog;
    public $showSuccess = false;

    public function mount ($blog) {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->image = $blog->image;
    }

    public function render()
    {
        return view('livewire.backend.blogs.update');
    }

    public function update()
    {
        $data = $this->validate([
            'title' => 'required|string|min:5|unique:blogs,title,' . $this->blog->id,
            'image' => 'nullable|image',
        ]);

        $this->blog->title = $data['title'];
        // $path = 'blogs/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('blogs', [
                'disk' => 'content_managment',
            ]);
        }
        $this->blog->image = $path ?? $this->blog->image;

        $this->showSuccess = $this->blog->save();
    }
}
