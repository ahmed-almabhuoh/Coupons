<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;
    public $name;
    public $status;
    public $image;
    public $showSuccess = false;

    public function mount($category)
    {
        $this->category = $category;
        $this->name = $this->category->name;
        $this->status = $this->category->status;
    }

    public function render()
    {
        return view('livewire.backend.categories.update', [
            'category' => $this->category,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:categories,name,' . $this->category->id,
            'status' => 'required|string|in:' . implode(",", Category::STATUS),
            'image' => 'nullable',
        ]);

        $this->category->name = $data['name'];
        $this->category->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('categories', [
                'disk' => 'content_managment',
            ]);
            $this->category->image = $path;
        }
        $this->showSuccess = $this->category->save();
        return redirect()->route('categories.index');
    }
}
