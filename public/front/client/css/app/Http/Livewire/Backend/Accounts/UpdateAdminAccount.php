<?php

namespace App\Http\Livewire\Backend\Accounts;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAdminAccount extends Component
{
    use WithFileUploads;

    public $showSuccess;
    public $user;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $image;

    public function mount()
    {
        $this->fname = $this->user->fname;
        $this->lname = $this->user->lname;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
    }

    public function render()
    {
        return view('livewire.backend.accounts.update-admin-account');
    }

    // Update account
    public function update()
    {
        $data = $this->validate([
            'fname' => 'required|string|min:2|max:25',
            'lname' => 'required|string|min:2|max:25',
            'email' => 'required|email|unique:admins,email,' . $this->user->id,
            'phone' => 'required|string|min:7|max:25',
            'image' => 'nullable',
        ]);


        $path = 'admins/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('admins', [
                'disk' => 'human_resources',
            ]);
        }else {
            $path = $this->user->image;
        }
        DB::table('admins')->where('id', $this->user->id)->update([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $path,
            'updated_at' => Carbon::now(),
        ]);

        $this->showSuccess = true;
    }
}
