<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageAccount extends Component
{
    use WithFileUploads;

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
        if (!is_null($user->phone)) {
            $this->phone = $user->phone;
        } else {
            $this->phone = '966 |';
        }
        $this->notification = $user->notification;
    }

    public function render()
    {
        return view('livewire.front.auth.manage-account');
    }

    public function updateAccount()
    {
        $data = $this->validate([
            'fullname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:users,email,' . auth('client')->user()->id,
            'phone' => 'nullable|unique:users,phone,' . auth('client')->user()->id,
            'image' => 'nullable',
            'notification' => 'required|boolean',
        ]);

        $user = User::where('id', auth('client')->user()->id)->first();
        $names = explode(" ", $this->fullname);
        $user->fname = $names[0];
        $user->lname = $names[1];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->notification = $data['notification'];
        if ($data['image']) {
            $path = $data['image']->store('users', [
                'disk' => 'human_resources',
            ]);
            $user->image = $path;
        }

        $user->save();
    }
}
