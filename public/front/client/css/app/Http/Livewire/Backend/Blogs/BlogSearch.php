<?php

namespace App\Http\Livewire\Backend\Blogs;

use App\Models\Blog;
use Livewire\Component;

class BlogSearch extends Component
{

    protected $blogs;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        $this->blogs = Blog::where(function ($query) {
            $query->where('title', 'like', "%" . $this->searchTerm . "%")
                ->where('status', 'LIKE',  "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);

        return view('livewire.backend.blogs.blog-search', [
            'blogs' => $this->blogs,
        ]);
    }
}
