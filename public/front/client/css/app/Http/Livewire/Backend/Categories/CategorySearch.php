<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;

class CategorySearch extends Component
{
    protected $categories;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->categories = Category::where(function ($query) {
            $query->where('name', 'like', "%" . $this->searchTerm . "%");
        })->withCount('coupons')->withCount('blogs')->withCount('products')->paginate($this->paginate);

        return view('livewire.backend.categories.category-search', [
            'categories' => $this->categories,
        ]);
    }
}
