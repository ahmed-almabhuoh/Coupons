<?php

namespace App\Http\Livewire\Backend\Stores;

use App\Models\Store;
use Livewire\Component;

class StoreSearch extends Component
{
    protected $stores;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->stores = Store::where(function ($query) {
            $query->where('name', 'like', "%" . $this->searchTerm . "%");
        })->withCount('coupons')->paginate($this->paginate);

        return view('livewire.backend.stores.store-search', [
            'stores' => $this->stores,
        ]);
    }
}
