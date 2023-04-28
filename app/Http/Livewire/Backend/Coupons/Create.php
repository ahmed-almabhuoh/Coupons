<?php

namespace App\Http\Livewire\Backend\Coupons;

use App\Models\Coupon;
use Carbon\Carbon;
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
    public $duration = 0;
    public $cusDate;
    public $url;

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
            'duration' => 'required|integer|min:0',
            'cusDate' => 'nullable|date|after_or_equal:today',
            'url' => 'nullable',
        ]);

        $coupon = new Coupon();
        $coupon->code = $data['code'];
        $coupon->discount = $data['discount'];
        $coupon->status = $data['status'];
        $coupon->category_id = $data['category_id'];
        $coupon->description = $data['description'];
        $coupon->store_id = $data['store_id'];
        $coupon->duration = $data['duration'];
        $coupon->url = $data['url'];
        $date = Carbon::now();
        $coupon->from_date = $data['cusDate'] ?? $date;
        $coupon->to_date = $date->copy()->addDays($data['duration']);
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
        $this->duration = '';
        $this->url = '';
    }
}
