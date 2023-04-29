<?php

namespace App\Http\Livewire\Backend\Products;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    protected $products;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->products = Product::where(function ($query) {
            $query->where('name', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('offer', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('price', 'like', "%" . $this->searchTerm . "%")
                ->orWhere('code', 'like', "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);

        return view('livewire.backend.products.product-search', [
            'products' => $this->products,
        ]);
    }
}
