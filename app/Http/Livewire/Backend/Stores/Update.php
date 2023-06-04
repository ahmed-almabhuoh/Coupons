<?php

namespace App\Http\Livewire\Backend\Stores;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    public $icon;
    public $action;
    public $description;
    public $store;
    public $countries;
    public $country_id;
    public $showSuccess = false;

    public function mount($store)
    {
        $this->store = $store;
        $this->name = $this->store->name;
        $this->status = $this->store->status;
        $this->action = $this->store->action;
        $this->description = $this->store->description;
        $this->country_id = $this->store->country_id;
    }

    public function render()
    {
        if (!auth()->user()->can('edit-store')) {
            abort(403);
        }
        return view('livewire.backend.stores.update', [
            'store' => $this->store,
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'name' => 'required|string|min:2|max:25',
            'status' => 'required|string|in:' . implode(",", Store::STATUS),
            'action' => 'required|string|min:4',
            'description' => 'nullable|min:10|max:100',
            'country_id' => 'nullable|integer|exists:countries,id',
            'icon' => 'nullable',
        ]);

        $this->store->name = $data['name'];
        $this->store->action = $data['action'];
        $this->store->status = $data['status'];
        if ($data['status'] == 'draft'){
            foreach ($this->store->coupons as $coupon) {
                $coupon = Coupon::where('id', $coupon->id)->first();
                $coupon->status = 'draft';
                $coupon->save();
            }

            foreach ($this->store->products as $product) {
                $product = Product::where('id', $product->id)->first();

                $product->status = 'draft';
                $product->save();
            }
        }
        $this->store->country_id = $data['country_id'];
        $this->store->description = $data['description'];
        if ($data['icon']) {
            $path = $data['icon']->store('stores', [
                'disk' => 'content_managment',
            ]);
            $this->store->icon = $path;
        } else {
            if (!$this->store->icon)
                $this->store->icon = 'stores/default.png';
        }
        $this->showSuccess = $this->store->save();

        return redirect()->route('stores.index');
    }
}
