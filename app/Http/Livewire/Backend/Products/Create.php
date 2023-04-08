<?php

namespace App\Http\Livewire\Backend\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $category_id;
    public $store_id;
    public $coupon_id;
    public $image;
    public $showSuccess = false;
    public $categories;
    public $stores;
    public $coupons;

    public function render()
    {
        return view('livewire.backend.products.create');
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|unique:products,name',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'store_id' => 'required|integer|exists:stores,id',
            'coupon_id' => 'nullable|integer|exists:coupons,id',
            'image' => 'nullable',
        ]);

        // $product = $this->product;
        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        $product->store_id = $data['store_id'];
        $product->coupon_id = $data['coupon_id'];
        if ($data['image']) {
            $path = $data['image']->store('products', [
                'disk' => 'content_managment',
            ]);
            $product->image = $path;
        } else {
            $product->image = 'products/default.png';
        }

        $this->showSuccess = $product->save();

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
    }
}