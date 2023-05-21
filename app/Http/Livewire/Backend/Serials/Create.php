<?php

namespace App\Http\Livewire\Backend\Serials;

use App\Mail\SendLicenseMail;
use App\Models\Serial;
use App\Notifications\SendLicensePageNoficiation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $email;
    public $password;
    public $serial;
    public $username;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.serials.create');
    }

    public function generate()
    {
        $this->serial =  Str::uuid()->toString();

        $characters = 'abcdefghijklmnopqrstuvwxyz1234567890@_';
        $username = '';
        $length = 12;
        for ($i = 0; $i < $length; $i++) {
            $username .= $characters[rand(0, strlen($characters) - 1)];
        }
        $this->username = $username;

        $this->password = Str::random(10);
    }


    public function store()
    {
        if (!auth()->user()->can('create-serial')) {
            abort(403);
        }
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'serial' => 'required|string|min:10',
            'username' => 'required|string|min:6',
        ]);

        $serial = new Serial();
        $serial->email = $data['email'];
        $serial->password = Hash::make($data['password']);
        $serial->username = $data['username'];
        $serial->serial = $data['serial'];
        $this->showSuccess = $serial->save();

        if ($this->showSuccess) {
            // $_data = [
            //     'username' => $data['username'],
            //     'password' => $data['password'],
            //     'serial' => $data['serial'],
            //     'url' => route('license.page')
            // ];

            Mail::to($data['email'])->queue(new SendLicenseMail(
                $data['username'],
                $data['password'],
                $data['serial'],
                route('license.page'),
                $data['email']
            ));
        }

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }

    // Reset models
    protected function resetModels()
    {
        $this->email = '';
        $this->username = '';
        $this->password = '';
        $this->serial = '';
    }
}
