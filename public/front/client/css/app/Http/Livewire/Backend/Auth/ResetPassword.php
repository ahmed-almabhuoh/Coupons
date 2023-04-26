<?php

namespace App\Http\Livewire\Backend\Auth;

use App\Jobs\SendPasswordResetEmailJob;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.backend.auth.reset-password');
    }

    public function resetPassword()
    {
        $data = $this->validate([
            'email' => 'required|email|exists:admins,email',
        ]);

        // Generate a random token for the password reset link
        $token = Str::random(32);

        // Get the user's email address from your database
        $user_email = "user@example.com";

        // Hash the token for security
        $hashed_token = Hash::make($token);

        // Save the hashed token and the user's email address to your database
        // ...

        // Create the password reset link with the hashed token and email address
        $link = url("/reset-password/$hashed_token/$user_email");
        $user = Admin::where('email', $data['email'])->first();

        SendPasswordResetEmailJob::dispatch($user, $link);

        return redirect()->route('login')->with([
            'message' => 'Check your email to reset your password',
        ]);
    }
}
