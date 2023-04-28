<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Coupon;
use Livewire\Component;

class Home extends Component
{
    public $stores;
    public $categories;
    public $coupons;
    public $selected_category = 'all';

    public function render()
    {
        return view('livewire.front.client.home');
    }

    // Get coupons from store
    public function getCouponsFromStore($selectedStore)
    {
        $this->coupons = Coupon::active()->whereHas('store', function ($query) use ($selectedStore) {
            $query->where('id', $selectedStore);
        })->get();
    }

    // Get coupons from store
    public function getCouponsFromCategory($selectedCategory)
    {
        $this->selected_category = $selectedCategory;
        if ($selectedCategory == 'all') {
            $this->coupons = Coupon::active()->get();
        } else {
            $this->coupons = Coupon::active()->whereHas('store', function ($query) use ($selectedCategory) {
                $query->where('id', $selectedCategory);
            })->get();
        }
    }
}
