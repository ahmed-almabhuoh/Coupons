<?php

namespace App\Http\Livewire\Backend\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

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
        return view('livewire.backend.users.create');
    }

    public function store()
    {
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'status' => 'required|string|in:active,disabled',
            'image' => 'nullable',
        ]);

        $user = new User();
        $user->fname = $data['fname'];
        $user->lname = $data['lname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('users', [
                'disk' => 'human_resources',
            ]);
            // $filename = Str::afterLast($path, '/');
            // $user->image = asset('storage/' . $filename);
            $user->image = $path;
        }
        $this->showSuccess = $user->save();

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
