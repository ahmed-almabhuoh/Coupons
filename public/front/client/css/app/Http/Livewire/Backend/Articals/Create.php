<?php

namespace App\Http\Livewire\Backend\Articals;

use App\Models\Artical;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $description;
    public $image;
    public $status;
    public $blog_id;
    public $blogs;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.articals.create');
    }

    public function store()
    {
        $data = $this->validate([
            'description' => 'required|string|min:50',
            'blog_id' => 'required|integer|exists:blogs,id',
            'status' => 'required|string|in:' . implode(",", Artical::STATUS),
            'image' => 'nullable|image',
        ]);

        $artical = new Artical();
        $artical->description = $data['description'];
        $artical->status = $data['status'];
        $artical->blog_id = $data['blog_id'];
        $path = 'articals/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('articals', [
                'disk' => 'content_managment',
            ]);
        }
        $artical->image = $path;

        $this->showSuccess = $artical->save();
        if ($this->showSuccess) {
            $this->resetModels();
        }
    }

    // Reset models
    protected function resetModels()
    {
        $this->description = '';
        $this->status = '';
        $this->image = '';
    }
}
