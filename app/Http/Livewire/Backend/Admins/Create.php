<?php

namespace App\Http\Livewire\Backend\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

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


    public function render()
    {
        return view('livewire.backend.admins.create');
    }

    public function store()
    {
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|string|unique:admins,phone',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'status' => 'required|string|in:active,disabled',
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
            $path = $data['image']->store('public', 'local');
            $filename = Str::afterLast($path, '/');
            $admin->image = asset('storage/' . $filename);
        }
        $this->showSuccess = $admin->save();

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
    }
}
