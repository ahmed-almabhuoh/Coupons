<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    public $image;
    public $showSuccess = false;


    public function render()
    {
        return view('livewire.backend.categories.create');
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:categories,name',
            'status' => 'required|string|in:' . implode(",", Category::STATUS),
            'image' => 'required|image|dimensions:max_width=100,max_height=100',
        ]);

        $category = new Category();
        $category->name = $data['name'];
        $category->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('categories', [
                'disk' => 'content_managment',
            ]);
            $category->image = $path;
        }
        $this->showSuccess = $category->save();

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->name = '';
        $this->status = '';
        $this->image = '';
    }
}
