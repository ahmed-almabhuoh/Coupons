<?php

namespace App\Http\Livewire\Backend\Admins;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    public function mount($admin)
    {
        $this->admin = $admin;
        $this->fname = $this->admin->fname;
        $this->lname = $this->admin->lname;
        $this->email = $this->admin->email;
        $this->phone = $this->admin->phone;
        $this->status = $this->admin->status;
    }

    public function render()
    {
        return view('livewire.backend.admins.update', [
            'admin' => $this->admin,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:admins,email,' . $this->admin->id,
            'phone' => 'required|string|unique:admins,phone,'. $this->admin->id,
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
            'status' => 'required|string|in:active,disabled',
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
            // $filename = Str::afterLast($path, '/');
            // $admin->image = asset('storage/' . $filename);
            $this->admin->image = $path;
        }
        $this->showSuccess = $this->admin->save();
    }
}
