<?php

namespace App\Http\Livewire\Backend\Products;

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
    public $coupon_id;
    public $images;
    public $showSuccess = false;
    public $categories;
    public $stores;
    public $coupons;
    public $product;

    public function mount($product)
    {
        $this->product = $product;
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->code = $this->product->code;
        $this->offer = $this->product->offer;
        $this->store_id = $this->product->store_id;
        $this->category_id = $this->product->category_id;
        $this->coupon_id = $this->product->coupon_id;
    }

    public function render()
    {
        return view('livewire.backend.products.update', [
            'product' => $this->product,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|unique:products,name,' . $this->product->id,
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            'coupon_id' => 'nullable|integer|exists:coupons,id',
            'images' => 'nullable',
        ]);

        $product = $this->product;
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        $product->store_id = $data['store_id'];
        $product->coupon_id = $data['coupon_id'];
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
    }
}
