<?php

namespace App\Http\Livewire\Backend\Users;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    protected $users;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->users = User::where(function ($query) {
            $query->where('fname', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('lname', 'like', "%" . $this->searchTerm. "%");
        })->paginate($this->paginate);

        return view('livewire.backend.users.user-search', [
            'users' => $this->users,
        ]);
    }
}
