<?php

namespace App\Http\Livewire\Backend\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $status;
    public $blog;
    public $category_id;
    public $categories;
    public $store_id;
    public $stores;
    public $showSuccess = false;

    public function mount($blog)
    {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->status = $blog->status;
        $this->store_id = $blog->store_id;
        $this->category_id = $blog->category_id;
    }

    public function render()
    {
        return view('livewire.backend.blogs.update');
    }

    public function update()
    {
        if (!auth()->user()->can('edit-blog')) {
            abort(403);
        }
        $data = $this->validate([
            'title' => 'required|string|min:5|unique:blogs,title,' . $this->blog->id,
            'image' => 'nullable',
            'status' => 'required|string|in:' . implode(",", Blog::STATUS),
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        $this->blog->title = $data['title'];
        $this->blog->status = $data['status'];
        $this->blog->category_id = $data['category_id'];
        $this->blog->store_id = $data['store_id'];
        // $path = 'blogs/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('blogs', [
                'disk' => 'content_managment',
            ]);
        }
        $this->blog->image = $path ?? $this->blog->image;

        $this->showSuccess = $this->blog->save();
        return redirect()->route('blogs.index');
    }
}
