<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\Admin;
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
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        if (Auth::guard('client')->attempt($credentials)) {
            $this->messageStatus = 'success';
            $this->showMessage = 'Login successfully';
            return redirect()->route('users.favorite');
        } else {
            $this->messageStatus = 'error';
            $this->showMessage = 'Failed to login, please try again!';
        }
    }
}
