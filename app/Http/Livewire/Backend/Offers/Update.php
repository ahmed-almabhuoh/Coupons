<?php

namespace App\Http\Livewire\Backend\Offers;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    // public $title;
    public $btn_txt;
    public $btn_action;
    public $image;
    public $showSuccess = false;
    public $status;
    public $offer;

    public function mount($offer)
    {
        $this->offer = $offer;
        // $this->title = $this->offer->title;
        $this->btn_txt = $this->offer->btn_txt;
        $this->btn_action = $this->offer->btn_action;
        $this->status = $this->offer->status;
    }

    public function render()
    {
        return view('livewire.backend.offers.update');
    }

    public function update()
    {
        if (!auth()->user()->can('edit-offer')) {
            abort(403);
        }
        $data = $this->validate([
            // 'title' => 'required|string|min:5|unique:offers,title,' . $this->offer->id,
            'btn_txt' => 'nullable|min:2|max:20',
            'btn_action' => 'nullable|min:2',
            'status' => 'required|string|in:' . implode(",", Offer::STATUS),
            'image' => 'nullable|image|dimensions:width=400,height=120',
            // 'image' => [
            //     'required',
            //     'image',
            //     'dimensions:width=400,height=120',
            // ],
        ]);

        // $this->offer->title = $data['title'];
        $this->offer->btn_action = $data['btn_action'];
        $this->offer->btn_txt = $data['btn_txt'];
        $this->offer->status = $data['status'];
        // $offer->image = ;
        // $path = 'offers/default.jpg';
        if ($data['image']) {
            $path = $data['image']->store('offers', [
                'disk' => 'content_managment',
            ]);
        }
        $this->offer->image = $path ?? $this->offer->image;

        $this->showSuccess = $this->offer->save();

        return redirect()->route('offers.index');
    }
}
