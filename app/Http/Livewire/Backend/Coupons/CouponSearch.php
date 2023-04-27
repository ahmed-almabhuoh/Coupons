<?php

namespace App\Http\Livewire\Backend\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class CouponSearch extends Component
{
    protected $coupons;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        // $this->coupons = Coupon::where(function ($query) {
        //     $query->where('code', 'like', "%" . $this->searchTerm . "%")
        //         ->orWhere('discount', 'like', "%" . $this->searchTerm . "%")
        //         ->orWhere('status', 'like', "%" . $this->searchTerm . "%");
        // })->paginate($this->paginate);

        $this->coupons = Coupon::where(function ($query) {
            $query->where('code', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('discount', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('status', 'like', "%" . $this->searchTerm . "%")
                ->orWhereHas('category', function ($query) {
                    $query->where('name', 'like', "%" . $this->searchTerm . "%");
                })
                ->orWhereHas('store', function ($query) {
                    $query->where('name', 'like', "%" . $this->searchTerm . "%");
                });
        })->paginate($this->paginate);

        return view('livewire.backend.coupons.coupon-search', [
            'coupons' => $this->coupons,
        ]);
    }
}
