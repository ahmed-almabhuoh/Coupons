<?php

namespace App\Http\Livewire\Backend\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleSearch extends Component
{
    protected $roles;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        if (!auth()->user()->can('view-roles')) {
            abort(403);
        }
        $this->roles = Role::where('name', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginate);

        return view('livewire.backend.roles.role-search', [
            'roles' => $this->roles,
        ]);
    }
}
