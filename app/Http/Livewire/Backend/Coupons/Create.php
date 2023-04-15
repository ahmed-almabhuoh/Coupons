<?php

namespace App\Http\Livewire\Backend\Coupons;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $status;
    public $discount;
    public $code;
    public $category_id;
    public $store_id;
    public $showSuccess = false;
    public $categories;
    public $stores;
    public $description;

    public function render()
    {
        return view('livewire.backend.coupons.create');
    }

    public function store()
    {
        $data = $this->validate([
            'code' => 'required|string|min:3|unique:coupons,code',
            'status' => 'required|string|in:' . implode(",", Coupon::STATUS),
            'discount' => 'required|numeric|min:1|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            'description' => 'nullable|min:10|max:150',
        ]);

        $coupon = new Coupon();
        $coupon->code = $data['code'];
        $coupon->discount = $data['discount'];
        $coupon->status = $data['status'];
        $coupon->category_id = $data['category_id'];
        $coupon->description = $data['description'];
        $coupon->store_id = $data['store_id'];
        $this->showSuccess = $coupon->save();

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->code = '';
        $this->status = '';
        $this->discount = '';
        $this->category_id = '';
        $this->store_id = '';
        $this->description = '';
    }
}
