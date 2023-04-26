<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\Favorite as ModelsFavorite;
use App\Models\Store;
use Livewire\Component;

class Favorite extends Component
{
    protected $favorites;
    protected $stores;
    public $status_filter;
    public $platform_status;
    public $searchTerm;

    public function mount()
    {
        $this->favorites = ModelsFavorite::where('user_id', auth()->user()->id)->paginate(5);
    }

    public function render()
    {
        $this->stores = Store::active()->get();

        if (!is_null($this->searchTerm)) {
            $searchTerm = $this->searchTerm;
            $this->favorites = ModelsFavorite::whereHas('coupon', function ($query) use ($searchTerm) {
                $query->where([
                    ['code', 'LIKE', '%' . $searchTerm . '%'],
                ]);
            })->paginate(5);
        }
        return view('livewire.front.auth.favorite', [
            'favorites' => $this->favorites,
            'stores' => $this->stores,
        ]);
    }

    // Filter by platform
    public function filterByPlatform($platform_status)
    {
        $this->favorites = ModelsFavorite::whereHas('coupon', function ($query) use ($platform_status) {
            $query->whereHas('store', function ($query) use ($platform_status) {
                $query->where('id', $platform_status);
            });
        })->paginate(5);
    }

    // Filter by status
    public function filterByStatus($status_filter)
    {
        $this->favorites = ModelsFavorite::whereHas('coupon', function ($query) use ($status_filter) {
            $query->where('status', $status_filter);
        })->paginate(5);
    }
}
