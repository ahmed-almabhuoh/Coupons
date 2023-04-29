<?php

namespace App\Http\Livewire\Backend\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use WithFileUploads;

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

    public function mount()
    {
        $this->roles = Role::get();
    }

    public function render()
    {
        return view('livewire.backend.admins.create');
    }

    public function store()
    {
        if (!auth()->user()->can('create-admin')) {
            abort(403);
        }
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|string|unique:admins,phone',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'status' => 'required|string|in:active,disabled',
            'role_id' => 'required|integer|exists:roles,id',
            'image' => 'nullable',
        ]);

        $admin = new Admin();
        $admin->fname = $data['fname'];
        $admin->lname = $data['lname'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);
        $admin->phone = $data['phone'];
        $admin->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('admins', [
                'disk' => 'human_resources',
            ]);
            // $filename = Str::afterLast($path, '/');
            // $admin->image = asset('storage/' . $filename);
            $admin->image = $path;
        }
        $this->showSuccess = $admin->save();
        $admin->assignRole(Role::findById($data['role_id']));

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->fname = '';
        $this->lname = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->status = '';
        $this->image = '';
        $this->role_id = '';
    }
}
