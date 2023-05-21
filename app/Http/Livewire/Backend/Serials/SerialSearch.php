<?php

namespace App\Http\Livewire\Backend\Serials;

use App\Models\Serial;
use Livewire\Component;

class SerialSearch extends Component
{
    protected $serials;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        if (!auth()->user()->can('view-serials')) {
            abort(403);
        }

        $this->serials = Serial::where(function ($query) {
            $query->where('email', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('username', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('serial', 'like', "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);

        return view('livewire.backend.serials.serial-search', [
            'serials' => $this->serials,
        ]);
    }
}
