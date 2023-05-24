<?php

namespace App\Http\Livewire\Backend\Products;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $offer;
    public $code;
    public $category_id;
    public $store_id;
    public $countries;
    public $country_id;
    public $coupon_id;
    public $images;
    public $showSuccess = false;
    public $categories;
    public $stores;
    public $coupons;
    public $product;
    public $description;
    public $cusDate;
    public $action;
    public $duration = 0;
    public $specail;
    public $coupon_code;
    public $use_it_as_price;

    public function mount($product)
    {
        $this->product = $product;
        $this->name = $this->product->name;
        $this->price = $this->product->original_price;
        $this->country_id = $this->product->country_id;
        $this->code = $this->product->code;
        $this->offer = $this->product->offer == 0 ? $this->product->price : $this->product->offer;
        $this->store_id = $this->product->store_id;
        $this->category_id = $this->product->category_id;
        $this->coupon_id = $this->product->coupon_id;
        $this->description = $this->product->description;
        $this->description = $this->product->description;
        $this->cusDate = $this->product->from_date;
        $this->duration = $this->product->duration;
        $this->action = $this->product->action;
        $this->specail = $this->product->specail;
        $this->coupon_code = $this->product->coupon_code;

        $this->use_it_as_price = false;
    }

    public function render()
    {
        return view('livewire.backend.products.update', [
            'product' => $this->product,
        ]);
    }

    public function update()
    {
        if (!auth()->user()->can('edit-product')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            'country_id' => 'required|integer|exists:countries,id',
            // // 'coupon_id' => 'nullable',
            'coupon_code' => 'nullable',
            'images' => 'nullable',
            'description' => 'nullable|min:10|max:150',
            'offer' => 'required|integer|min:0|max:100',
            'duration' => 'required|min:0',
            'cusDate' => 'nullable|date|after_or_equal:today',
            'action' => 'required|string',
            'specail' => 'required|boolean',
            'use_it_as_price' => 'required|boolean',
        ]);
        $date = Carbon::now();

        // $product = $this->product;
        $this->product->name = $data['name'];
        $this->product->original_price = $data['price'];
        $this->product->category_id = $data['category_id'];
        $this->product->action = $data['action'];
        $this->product->store_id = $data['store_id'];
        $this->product->country_id = $data['country_id'];
        $this->product->duration = $data['duration'] ?? 0;
        $this->product->from_date = $data['cusDate'] ?? $date;
        $this->product->to_date = $date->copy()->addDays($data['duration']);
        $this->product->specail = $data['specail'];
        $this->product->coupon_code = $data['coupon_code'];

        // Add the offer by hand
        // if ($data['offer'] >= 0) {
        //     $this->product->offer = $data['offer'];
        //     $this->product->price = (($data['offer'] / 100) * $data['price']);
        //     $this->product->coupon_id = null;
        //     $this->product->code = null;
        // }
        // Add the offer by hand
        // if ($data['offer'] != 0 && !$this->use_it_as_price) {
        //     $this->product->offer = $data['offer'];
        //     $this->product->price = (($data['offer'] / 100) * $data['price']);
        // } else {
        //     $this->product->price = $data['offer'];
        // }
        if ($this->use_it_as_price) {
            $this->product->original_price = $data['offer'];
            $this->product->price = $data['offer'];
            $this->product->offer = 0;
        } else {
            if ($data['offer'] != 0) {
                $this->product->offer = $data['offer'];
                $this->product->original_price = $data['price'];
                $this->product->price = (($data['offer'] / 100) * $data['price']);
            } else {
                $this->product->price = $data['price'];
                $this->product->offer = $data['offer'];
                $this->product->original_price = $data['price'];
            }
        }

        // If you need to connect the price with coupon discount
        // if (is_numeric($data['coupon_id']) && is_numeric($data['coupon_id']) > 0) {
        //     $coupon = Coupon::findOrFail($data['coupon_id']);
        //     $this->product->coupon_id = $data['coupon_id'];
        //     $this->product->price = $data['price'] - (($coupon->discount / 100) * $data['price']);
        //     $this->product->offer = $coupon->discount;
        //     $this->product->code = $coupon->code;
        // }

        $this->product->description = $data['description'];
        $this->showSuccess = $this->product->save();

        if ($data['images']) {
            foreach ($data['images'] as $image) {
                $path = $image->store('products', [
                    'disk' => 'content_managment',
                ]);

                DB::table('product_images')->insert([
                    'image' => $path,
                    'product_id' => $this->product->id,
                ]);
            }
        }

        return redirect()->route('products.index');
    }
}
