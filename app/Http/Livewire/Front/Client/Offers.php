<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Offers extends Component
{
    public $products;
    public $allStores;
    public $selected_store;
    public $categories;
    public $selected_category;
    public $newSelectedCategory = 'all';

    // Product Info
    public $product_store;
    public $product_desc;
    public $product_discount;
    public $product_category;
    public $product_original_price;
    public $product_final_price;

    public function mount()
    {
        $this->allStores = Store::active()->get();
        $this->categories = Category::active()->get();
    }

    public function render()
    {
        return view('livewire.front.client.offers');
    }

    // Get stores & its products
    public function getStores($selectedStore)
    {
        $this->selected_store = Store::active()->where('id', Crypt::decrypt($selectedStore))->first();
        $this->products = $this->selected_store->products;
    }

    // Get categories & its products
    public function getCategories($selectedCategory = 'all')
    {
        if ($selectedCategory == 'all') {
            $this->products = Product::active()->get();
            $this->newSelectedCategory = 'all';
        } else {
            $this->newSelectedCategory = Crypt::decrypt($selectedCategory);
            $this->selected_category = Category::active()->where('id', Crypt::decrypt($selectedCategory))->first();
            $this->products = $this->selected_category->products;
        }
    }

    // Get product Info
    public function getProductInfo($id)
    {
        $product = Product::active()->where('id', Crypt::decrypt($id))->first();
        $this->product_category = $product->category;
        $this->product_store = $product->store;
        $this->product_desc = $product->description;
        $this->product_discount = $product->offer;
        $this->product_original_price = $product->original_price;
        $this->product_final_price = $product->price;
    }
}
