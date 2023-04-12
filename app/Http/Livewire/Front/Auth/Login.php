<?php

namespace App\Http\Livewire\Front\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $messageStatus = '';
    public $showMessage;

    public function render()
    {
        return view('livewire.front.auth.login');
    }

    public function login()
    {
        $data = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        if (Auth::guard('web')->attempt($credentials)) {
            $this->messageStatus = 'success';
            $this->showMessage = 'Login successfully';
            sleep(2);
            return redirect()->route('users.favorite');
        } else {
            $this->messageStatus = 'success';
            $this->showMessage = 'Login successfully';
        }
    }
}
