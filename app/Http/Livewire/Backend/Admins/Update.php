<?php

namespace App\Http\Livewire\Backend\Admins;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Update extends Component
{

    use WithFileUploads;

    public $admin;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $status;
    public $image;
    public $password;
    public $password_confirmation;
    public $showSuccess = false;
    public $roles;
    public $role_id;

    public function mount($admin)
    {
        $this->admin = $admin;
        $this->fname = $this->admin->fname;
        $this->lname = $this->admin->lname;
        $this->email = $this->admin->email;
        $this->phone = $this->admin->phone;
        $this->status = $this->admin->status;
        $this->roles = Role::get();
    }

    public function render()
    {
        return view('livewire.backend.admins.update', [
            'admin' => $this->admin,
        ]);
    }

    public function update()
    {
        if (!auth()->user()->can('edit-admin')) {
            abort(403);
        }
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:admins,email,' . $this->admin->id,
            'phone' => 'required|string|unique:admins,phone,' . $this->admin->id,
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
            'status' => 'required|string|in:active,disabled',
            'role_id' => 'required|integer|exists:roles,id',
            'image' => 'nullable',
        ]);

        $this->admin->fname = $data['fname'];
        $this->admin->lname = $data['lname'];
        $this->admin->email = $data['email'];
        if ($data['password']) {
            $this->admin->password = Hash::make($data['password']);
        }
        $this->admin->phone = $data['phone'];
        $this->admin->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('admins', [
                'disk' => 'human_resources',
            ]);
            $this->admin->image = $path;
        }
        $this->showSuccess = $this->admin->save();

        // Remove all previous roles
        $this->admin->syncRoles([]);

        // Assign the new role
        $this->admin->assignRole(Role::findById($data['role_id']));

        return redirect()->route('admins.index');
    }
}
