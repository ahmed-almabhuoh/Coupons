<?php

namespace App\Http\Livewire\Backend\Products;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $category_id;
    public $store_id;
    // public $coupon_id;
    public $coupon_code;
    public $description;
    public $images = [];
    public $showSuccess = false;
    public $categories;
    public $stores;
    public $coupons;
    public $offer = 0;
    public $duration = 0;
    public $cusDate;
    public $action;
    public $specail;
    public $use_it_as_price;

    public function render()
    {
        return view('livewire.backend.products.create');
    }

    public function store()
    {
        if (!auth()->user()->can('create-product')) {
            abort(403);
        }
        $data = $this->validate([
            'name' => 'required|string|min:2|unique:products,name',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            // 'coupon_id' => 'nullable',
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
        $product = new Product();
        $product->name = $data['name'];
        $product->original_price = $data['offer'];
        $product->category_id = $data['category_id'];
        $product->store_id = $data['store_id'];
        $product->action = $data['action'];
        $product->duration = $data['duration'] ?? 0;
        $product->from_date = $data['cusDate'] ?? $date;
        $product->to_date = $date->copy()->addDays($data['duration']);
        $product->specail = $data['specail'];
        $product->coupon_code = $data['coupon_code'];

        // Add the offer by hand
        if ($this->use_it_as_price) {
            $product->original_price = $data['offer'];
            $product->price = $data['offer'];
            $product->offer = 0;
        } else {
            if ($data['offer'] != 0) {
                $product->offer = $data['offer'];
                $product->original_price = $data['price'];
                $product->price = (($data['offer'] / 100) * $data['price']);
            } else {
                $product->price = $data['price'];
                $product->offer = $data['offer'];
                $product->original_price = $data['price'];
            }
        }


        // If you need to connect the price with coupon discount
        // if (is_numeric($data['coupon_id']) && is_numeric($data['coupon_id']) > 0) {
        //     $coupon = Coupon::findOrFail($data['coupon_id']);
        //     $product->coupon_id = $data['coupon_id'];
        //     $product->price = $data['price'] - (($coupon->discount / 100) * $data['price']);
        //     $product->offer = $coupon->discount;
        //     $product->code = $coupon->code;
        // }

        $product->description = $data['description'];
        $this->showSuccess = $product->save();

        foreach ($data['images'] as $image) {
            $path = $image->store('products', [
                'disk' => 'content_managment',
            ]);

            DB::table('product_images')->insert([
                'image' => $path,
                'product_id' => $product->id,
            ]);
        }

        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->name = '';
        $this->price = '';
        $this->coupon_id = '';
        $this->category_id = '';
        $this->store_id = '';
        $this->description = '';
        $this->offer = '';
        $this->action = '';
        $this->specail = false;
    }
}
