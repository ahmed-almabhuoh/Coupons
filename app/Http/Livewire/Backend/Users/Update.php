<?php

namespace App\Http\Livewire\Backend\Users;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $user;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $status;
    public $image;
    public $password;
    public $password_confirmation;
    public $showSuccess = false;

    public function mount($user)
    {
        $this->user = $user;
        $this->fname = $this->user->fname;
        $this->lname = $this->user->lname;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->status = $this->user->status;
    }

    public function render()
    {
        return view('livewire.backend.users.update', [
            'user' => $this->user,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|string|unique:users,phone,'. $this->user->id,
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
            'status' => 'required|string|in:active,disabled',
            'image' => 'nullable',
        ]);

        $this->user->fname = $data['fname'];
        $this->user->lname = $data['lname'];
        $this->user->email = $data['email'];
        if ($data['password']) {
            $this->user->password = Hash::make($data['password']);
        }
        $this->user->phone = $data['phone'];
        $this->user->status = $data['status'];
        if ($data['image']) {
            $path = $data['image']->store('users', [
                'disk' => 'human_resources',
            ]);
            // $filename = Str::afterLast($path, '/');
            // $user->image = asset('storage/' . $filename);
            $this->user->image = $path;
        }
        $this->showSuccess = $this->user->save();

        return redirect()->route('users.index');
    }
}
