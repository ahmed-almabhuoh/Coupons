<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.roles.create');
    }


    public function store()
    {
        if (!auth()->user()->can('create-role')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:roles,name',
        ]);

        $role = new Role();
        $role->name = $data['name'];
        $role->guard_name = 'admin';
        $this->showSuccess = $role->save();

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }

    // Reset models
    protected function resetModels()
    {
        $this->name = '';
    }
}
