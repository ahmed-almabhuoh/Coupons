<?php

namespace App\Http\Livewire\Backend\Aqs;

use App\Models\Aqs;
use Livewire\Component;

class AqsSearch extends Component
{
    protected $aqs;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        if (!auth()->user()->can('view-A&Qs')) {
            abort(403);
        }
        $this->aqs = Aqs::where(function ($query) {
            $query->where('title', 'like', "%" . $this->searchTerm . "%")
            ->orWhere('answer', 'like', "%" . $this->searchTerm . "%")
            ->orWhere('status', 'like', "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);


        return view('livewire.backend.aqs.aqs-search', [
            'aqs' => $this->aqs,
        ]);
    }
}
