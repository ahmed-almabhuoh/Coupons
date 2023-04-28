<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $msgStatus;
    public $msg;

    public function render()
    {
        return view('livewire.front.auth.change-password');
    }

    public function updatePassword()
    {
        $data = $this->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string', Password::min(8)->uncompromised(), 'confirmed'],
        ]);
        //
        $isChanged = false;

        if (Hash::check($data['current_password'], auth()->user()->password)) {
            $user = User::findOrFail(auth()->user()->id);
            $user->password = Hash::make($data['new_password']);
            $isChanged = $user->save();
        } else {
            $this->msgStatus = 'error';
            $this->msg = 'Incorrect password, please try again later!';
        }

        if ($isChanged) {
            $this->msgStatus = 'success';
            $this->msg = 'Password changed successfully';
            $this->resetModel();
        } else {
            $this->msgStatus = 'error';
            $this->msg = 'Failed to change your password, please try again!';
        }
    }

    public function resetModel () {
        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }
}
