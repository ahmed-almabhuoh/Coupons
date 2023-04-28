<?php

namespace App\Http\Livewire\Front\Client;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Store;
use Livewire\Component;

class Blogs extends Component
{
    public $blogs;
    public $categories;
    public $stores;
    public $selectedCategory = 'all';
    public $selectedStore = 'all';

    public function render()
    {
        return view('livewire.front.client.blogs');
    }

    public function selectByCAT($type = 'all')
    {
        $this->selectedCategory = $type;
        if ($type == 'all') {
            $this->blogs = Blog::active()->get();
        } else {
            $this->blogs = Blog::active()->whereHas('category', function ($query) use ($type) {
                $query->where('id', $type);
            })->get();
        }
    }

    public function dropForStores($type = 'all')
    {
        $this->selectedStore = $type;
        if ($type == 'all') {
            $this->blogs = Blog::active()->get();
        } else {
            $this->blogs = Blog::active()->whereHas('store', function ($query) use ($type) {
                $query->where('id', $type);
            })->get();
        }
    }
}
