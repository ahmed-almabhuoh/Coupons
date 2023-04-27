<?php

namespace App\Http\Livewire\Backend\WebsiteSettings;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SetupLogo extends Component
{
    use WithFileUploads;

    public $image;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.website-settings.setup-logo');
    }

    public function store()
    {
        $data = $this->validate([
            'image' => 'required|image',
        ]);

        if ($data['image']) {
            $path = $data['image']->store('website-settings', [
                'disk' => 'content_managment',
            ]);
            $id = DB::table('website_settings')->insertGetId([
                'logo' => $path,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($id) {
                $this->showSuccess = true;
            }
        }
    }
}
