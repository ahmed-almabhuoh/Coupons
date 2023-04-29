<?php

namespace App\Http\Livewire\Backend\Articals;

use App\Models\Artical;
use Livewire\Component;

class ArticalSearch extends Component
{
    protected $articals;
    public $searchTerm;
    public $paginate = 10;

    public function render()
    {
        if (!auth()->user()->can('view-articals')) {
            abort(403);
        }
        $this->articals = Artical::where(function ($query) {
            $query->where('description', 'like', "%" . $this->searchTerm . "%")
                ->where('status', 'like', "%" . $this->searchTerm . "%");
        })->paginate($this->paginate);

        return view('livewire.backend.articals.artical-search', [
            'articals' => $this->articals,
        ]);
    }
}
