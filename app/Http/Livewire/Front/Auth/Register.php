<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public $fullname;
    public $email;
    public $password;
    public $showMessage;

    public function render()
    {
        return view('livewire.front.auth.register');
    }

    public function register()
    {
        $data = $this->validate([
            'fullname' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', Password::min(6)->uncompromised()],
        ]);

        $names = explode(" ", $data['fullname']);
        $user = new User();
        $user->fname = $names[0] ?? '';
        $user->lname = $names[1] ?? '';
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $isCreated = $user->save();

        if ($isCreated)
            $this->showMessage = 'User registered successfully';

        sleep(1);
        return redirect()->route('users.login');
    }
}
