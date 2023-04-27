<?php

namespace App\Http\Livewire\Backend\Offers;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $btn_txt;
    public $btn_action;
    public $image;
    public $showSuccess = false;
    public $status;

    public function render()
    {
        return view('livewire.backend.offers.create');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|string|min:5|unique:offers,title',
            'btn_txt' => 'nullable|min:2|max:20',
            'btn_action' => 'nullable|min:2',
            'status' => 'required|string|in:' . implode(",", Offer::STATUS),
            'image' => 'required|image|max_width:320|max_height:320',
        ]);

        $offer = new Offer();
        $offer->title = $data['title'];
        $offer->btn_action = $data['btn_action'];
        $offer->btn_txt = $data['btn_txt'];
        $offer->status = $data['status'];
        // $offer->image = ;
        $path = 'offers/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('offers', [
                'disk' => 'content_managment',
            ]);
        }
        $offer->image = $path;

        $this->showSuccess = $offer->save();
        if ($this->showSuccess) {
            $this->resetModels();
        }
    }


    // Reset models
    protected function resetModels()
    {
        $this->title = '';
        $this->btn_txt = '';
        $this->btn_action = '';
        $this->image = '';
        $this->status = '';
    }
}
