<?php

namespace App\Http\Livewire\Front\Auth;

use Livewire\Component;

class ManageAccount extends Component
{
    public $fullname;
    public $email;
    public $phone;
    public $notification;
    public $image;

    public function mount()
    {
        $user = auth()->user();
        $this->fullname = $user->fname . ' ' . $user->lname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->notification = $user->notification;
    }

    public function render()
    {
        return view('livewire.front.auth.manage-account');
    }
}
