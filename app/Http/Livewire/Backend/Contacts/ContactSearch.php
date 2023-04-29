<?php

namespace App\Http\Livewire\Backend\Contacts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ContactSearch extends Component
{
    protected $contacts;

    public function mount()
    {
        $this->contacts = DB::table('contact_us')->paginate();
    }

    public function render()
    {
        if (!auth()->user()->can('contact-us')) {
            abort(403);
        }
        return view('livewire.backend.contacts.contact-search', [
            'contacts' => $this->contacts,
        ]);
    }
}
