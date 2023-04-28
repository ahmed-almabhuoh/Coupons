<?php

namespace App\Http\Livewire\Backend\Offers;

use App\Models\Offer;
use Livewire\Component;

class OfferSearch extends Component
{
    protected $offers;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->offers = Offer::where(function ($query) {
            $query->where('title', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('btn_txt', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('btn_action', 'like', "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);

        return view('livewire.backend.offers.offer-search', [
            'offers' => $this->offers,
        ]);
    }
}
