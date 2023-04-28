<?php

namespace App\Http\Livewire\Backend\Admins;

use App\Models\Admin;
use Livewire\Component;

class AdminSearch extends Component
{
    protected $admins;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->admins = Admin::where(function ($query) {
            $query->where('fname', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('lname', 'like', "%" . $this->searchTerm. "%");
        })->paginate($this->paginate);

        return view('livewire.backend.admins.admin-search', [
            'admins' => $this->admins,
        ]);
    }
}
