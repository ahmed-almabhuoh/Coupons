<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Coupon;
use Livewire\Component;

class Coupons extends Component
{
    public $stores;
    public $coupons;
    public $categories;
    public $selected_category;

    public function render()
    {
        return view('livewire.front.client.coupons');
    }

    // Store Coupons
    public function getCouponsDependOnStore($selectedStore)
    {
        $this->coupons = Coupon::active()->whereHas('store', function ($query) use ($selectedStore) {
            $query->where('id', '=', $selectedStore);
        })->get();
    }

    // Category Coupons
    public function getCouponsDependOnCategory($selectedCategory)
    {
        $this->selected_category = $selectedCategory;
        if ($selectedCategory == 'all') {
            $this->coupons = Coupon::active()->get();
        } else {
            $this->coupons = Coupon::active()->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('id', '=', $selectedCategory);
            })->get();
        }
    }
}
