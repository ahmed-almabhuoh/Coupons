<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
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

    // Add to favorite
    public function addToFavorite($id, $position)
    {
        $conditions = [];
        if ($position == 'coupon') {
            $conditions[] = ['coupon_id', '=', $id];
        } else {
            $conditions[] = ['product_id', '=', $id];
        }



        if (DB::table('favorites')->where([
            ['position', '=', $position],
            $conditions[0]
        ])->exists()) {
            DB::table('favorites')->where([
                ['position', '=', $position],
                $conditions[0]
            ])->delete();
        } else {
            if (auth('client')->check()) {
                DB::table('favorites')->insert([
                    'user_id' => auth()->user()->id,
                    'position' => $position == 'coupon' ? 'coupon' : 'product',
                    'coupon_id' => $position == 'coupon' ? $id : 0,
                    'product_id' => $position == 'product' ? $id : 0,
                ]);
            }
        }
    }
}
