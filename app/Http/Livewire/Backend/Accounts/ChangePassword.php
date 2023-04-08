<?php

namespace App\Http\Livewire\Backend\Accounts;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $user;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.accounts.change-password');
    }

    public function changePassword()
    {
        $data = $this->validate([
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The ' . $attribute . ' is incorrect.');
                }
            }],
            'new_password' => 'required|string|confirmed|min:6',
        ]);

        // if () {}
        DB::table('admins')->where('id', $this->user->id)->update([
            'password' => Hash::make($data['new_password']),
            'updated_at' => Carbon::now(),
        ]);

        $this->showSuccess = true;
        $this->resetModel();
    }

    public function resetModel () {
        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }
}
