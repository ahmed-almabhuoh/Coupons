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
    public $status;
    public $category_id;
    public $store_id;
    public $stores;
    public $categories;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.blogs.create');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|string|min:5|unique:blogs,title',
            'image' => 'nullable',
            'status' => 'required|string|in:' . implode(",", Blog::STATUS),
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->status = $data['status'];
        $blog->category_id = $data['category_id'];
        $blog->store_id = $data['store_id'];
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
        $this->status = '';
        $this->category_id = '';
        $this->store_id = '';
    }
}
