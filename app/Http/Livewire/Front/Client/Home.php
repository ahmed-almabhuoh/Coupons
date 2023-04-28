<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Coupon;
use Carbon\Carbon;
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
            $this->coupons = Coupon::active()->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('id', $selectedCategory);
            })->get();
        }
    }

    // Add to favorite
    public function addToFavorite($id, $position)
    {
        // addToFavorite(42, "product")
        $conditions = [];
        if ($position == 'coupon') {
            $conditions[] = ['coupon_id', '=', $id];
            DB::table('coupons')->where('id', $id)->update([
                'last_use' => Carbon::now(),
            ]);
        } elseif ($position == 'product') {
            $conditions[] = ['product_id', '=', $id];
            DB::table('products')->where('id', $id)->update([
                'last_use' => Carbon::now(),
            ]);
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
                $id = DB::table('favorites')->insertGetId([
                    'user_id' => auth()->user()->id,
                    'position' => $position == 'coupon' ? 'coupon' : 'product',
                    'coupon_id' => $position == 'coupon' ? $id : null,
                    'product_id' => $position == 'product' ? $id : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                return response()->json($id);
            }
        }
    }
}
