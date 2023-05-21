<?php

namespace App\Http\Livewire\Backend\Countries;

use App\Models\Country;
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
        return view('livewire.backend.countries.create');
    }

    public function store()
    {
        if (!auth()->user()->can('create-country')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:countries,name',
            'status' => 'required|string|in:' . implode(",", Country::STATUS),
            'image' => 'required|image|dimensions:max_width=512,max_height=512',
        ]);

        $country = new Country();
        $country->name = $data['name'];
        $country->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('countries', [
                'disk' => 'content_managment',
            ]);
            $country->img = $path;
        }
        $this->showSuccess = $country->save();

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
