<?php

namespace App\Http\Livewire\Backend\Countries;

use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $country;
    public $name;
    public $status;
    public $image;
    public $showSuccess = false;

    public function mount($country)
    {
        $this->country = $country;
        $this->name = $this->country->name;
        $this->status = $this->country->status;
    }

    public function render()
    {
        return view('livewire.backend.countries.update');
    }


    public function update()
    {
        if (!auth()->user()->can('edit-country')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:countries,name,' . $this->country->id,
            'status' => 'required|string|in:' . implode(",", Country::STATUS),
            'image' => 'nullable',
        ]);

        $this->country->name = $data['name'];
        $this->country->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('countries', [
                'disk' => 'content_managment',
            ]);
            $this->country->img = $path;
        }
        $this->showSuccess = $this->country->save();
        return redirect()->route('countries.index');
    }
}
