<?php

namespace App\Http\Livewire\Backend\Countries;

use App\Models\Country;
use Livewire\Component;

class CountrySearch extends Component
{
    protected $countries;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        if (!auth()->user()->can('view-countries')) {
            abort(403);
        }
        $this->countries = Country::where([
            ['name', 'LIKE', '%' . $this->searchTerm . '%'],
            ['status', '=', 'draft']
        ])->withCount('stores')->paginate($this->paginate);

        return view('livewire.backend.countries.country-search', [
            'countries' => $this->countries,
        ]);
    }
}
