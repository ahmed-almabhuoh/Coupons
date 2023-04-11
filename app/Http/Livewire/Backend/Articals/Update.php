<?php

namespace App\Http\Livewire\Backend\Articals;

use App\Models\Artical;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $description;
    public $image;
    public $status;
    public $blog_id;
    public $blogs;
    public $artical;
    public $showSuccess = false;

    public function mount($artical)
    {
        $this->artical = $artical;
        $this->description = $artical->description;
        $this->status = $artical->status;
        $this->blog_id = $artical->blog_id;
    }

    public function render()
    {
        return view('livewire.backend.articals.update');
    }

    public function update()
    {
        $data = $this->validate([
            'description' => 'required|string|min:50',
            'blog_id' => 'required|integer|exists:blogs,id',
            'status' => 'required|string|in:' . implode(",", Artical::STATUS),
            'image' => 'nullable|image',
        ]);

        $this->artical->description = $data['description'];
        $this->artical->status = $data['status'];
        $this->artical->blog_id = $data['blog_id'];
        // $path = 'articals/default.jpg';
        $path = '';
        if ($data['image']) {
            $path = $data['image']->store('articals', [
                'disk' => 'content_managment',
            ]);
        }
        $this->artical->image = $path ?? $this->artical->image;

        $this->showSuccess = $this->artical->save();
    }
}
