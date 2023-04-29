<?php

namespace App\Http\Livewire\Front\Auth;

use App\Models\Favorite as ModelsFavorite;
use Livewire\Component;

class Favorite extends Component
{
    protected $favorites;
    public $status_filter;
    public $platform_status;
    public $searchTerm;

    public function render()
    {
        $this->favorites = ModelsFavorite::where('user_id', auth()->user()->id)->paginate(5);
        return view('livewire.front.auth.favorite', [
            'favorites' => $this->favorites,
        ]);
    }
}
