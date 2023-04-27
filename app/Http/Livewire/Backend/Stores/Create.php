<?php

namespace App\Http\Livewire\Backend\Stores;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    public $icon;
    public $action;
    public $description;
    public $showSuccess = false;


    public function render()
    {
        return view('livewire.backend.stores.create');
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:stores,name',
            'status' => 'required|string|in:' . implode(",", Store::STATUS),
            'action' => 'required|string|min:4',
            'description' => 'nullable|min:10|max:100',
            'icon' => 'nullable',
        ]);

        $store = new Store();
        $store->name = $data['name'];
        $store->action = $data['action'];
        $store->status = $data['status'];
        $store->description = $data['description'];
        if ($data['icon']) {
            $path = $data['icon']->store('stores', [
                'disk' => 'content_managment',
            ]);
            $store->icon = $path;
        } else {
            $store->icon = 'stores/default.png';
        }
        $this->showSuccess = $store->save();

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->name = '';
        $this->status = '';
        $this->icon = '';
        $this->action = '';
        $this->description = '';
    }
}
