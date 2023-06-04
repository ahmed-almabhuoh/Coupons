<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Offers extends Component
{
    use WithPagination;

    // Add this property if you want to use Bootstrap
    protected $paginationTheme = 'bootstrap';

    protected $products;
    public $allStores;
    public $selected_store = 'all';
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
        $this->selected_category = 'all';
        // $this->products = $products;

    }

    public function render()
    {
        $this->products = Product::active()->with('store')->paginate(9);
        foreach ($this->products as $product) {
            $image_path = DB::table('product_images')->where('product_id', $product->id)->first();
            if (!is_null($image_path))
                $product->setAttribute('image', $image_path->image);
        }

        return view('livewire.front.client.offers', [
            'products' => $this->products,
        ]);
    }

    // Get stores & its products
    public function getStores($selectedStore)
    {
        $this->selected_store = Store::active()->where('id', Crypt::decrypt($selectedStore))->first();
        $this->products = $this->selected_store->products()->paginate(9);
    }

    // Get categories & its products
    public function getCategories($selectedCategory = 'all')
    {
        $this->resetPage();
        if ($selectedCategory == 'all') {
            $this->products = Product::active()->paginate(9);
            $this->newSelectedCategory = 'all';
        } else {
            $this->newSelectedCategory = Crypt::decrypt($selectedCategory);
            $this->selected_category = Category::active()->where('id', Crypt::decrypt($selectedCategory))->first();
            $this->products = $this->selected_category->products()->paginate(9);
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

    public function getProductFromCategory($selected_category = 'all')
    {
        $this->resetPage();

        if ($selected_category == 'all') {
            $this->products = Product::active()->paginate(9);
            $this->selected_category = 'all';
        } else {
            $cat = Category::where('id', $selected_category)->with('products')->first();
            $this->products = $cat->products;
            $this->selected_category = $cat->id;
        }
    }
}
