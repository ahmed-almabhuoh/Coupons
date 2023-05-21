<?php

namespace App\Http\Livewire\Backend\Serials;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Update extends Component
{
    // public $title;
    public $email;
    public $password;
    public $username;
    public $showSuccess = false;
    public $serial;

    public function mount($serial)
    {
        $this->serial = $serial;
        $this->email = $this->serial->email;
        $this->username = $this->serial->username;
        $this->serial = $this->serial->serial;
    }

    public function render()
    {
        return view('livewire.backend.serials.update');
    }

    public function update()
    {
        if (!auth()->user()->can('edit-serial')) {
            abort(403);
        }
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'username' => 'required|string|min:6',
            'serial' => 'required|string|min:10',
        ]);

        $this->serial->email = $data['email'];
        $this->serial->password = Hash::make($data['password']);
        $this->serial->username = $data['username'];
        $this->serial->serial = $data['serial'];

        $this->showSuccess = $this->serial->save();

        return redirect()->route('serials.index');
    }
}
