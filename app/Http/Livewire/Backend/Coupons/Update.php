<?php

namespace App\Http\Livewire\Backend\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $status;
    public $discount;
    public $code;
    public $category_id;
    public $store_id;
    public $showSuccess = false;
    public $coupon;
    public $stores;
    public $categories;
    public $description;

    public function mount($coupon)
    {
        $this->coupon = $coupon;
        $this->discount = $this->coupon->discount;
        $this->code = $this->coupon->code;
        $this->category_id = $this->coupon->category_id;
        $this->store_id = $this->coupon->store_id;
        $this->status = $this->coupon->status;
        $this->description = $this->coupon->description;
    }

    public function render()
    {
        return view('livewire.backend.coupons.update', [
            'coupon' => $this->coupon,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'code' => 'required|string|min:3|unique:coupons,code,' . $this->coupon->id,
            'status' => 'required|string|in:' . implode(",", Coupon::STATUS),
            'discount' => 'required|numeric|min:1|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            'description' => 'nullable|min:10|max:150',
        ]);

        $this->coupon->code = $data['code'];
        $this->coupon->discount = $data['discount'];
        $this->coupon->status = $data['status'];
        $this->coupon->category_id = $data['category_id'];
        $this->coupon->store_id = $data['store_id'];
        $this->coupon->description = $data['description'];
        $this->showSuccess = $this->coupon->save();
    }
}
