<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;

class Update extends Component
{
    public $role;
    public $name;
    public $showSuccess = false;

    public function mount($role)
    {
        $this->role = $role;
        $this->name = $this->role->name;
    }

    public function render()
    {
        return view('livewire.backend.roles.update', [
            'role' => $this->role,
        ]);
    }


    public function update()
    {
        if (!auth()->user()->can('edit-role')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25|unique:roles,name,' . $this->role->id,
        ]);

        $this->role->name = $data['name'];
        $this->showSuccess = $this->role->save();

        return redirect()->route('roles.management');
    }
}
