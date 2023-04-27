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
    public $is_shown;
    public $showSuccess = false;

    public function render()
    {
        return view('livewire.backend.website-settings.setup-logo');
    }

    public function store()
    {
        $data = [];
        $site = DB::table('website_settings')->first();

        if (is_null($site)) {
            $data = $this->validate([
                'image' => 'required|image',
                'is_shown' => 'required|boolean',
            ]);
        } else {
            $data = $this->validate([
                'image' => 'nullable',
                'is_shown' => 'required|boolean',
            ]);
        }

        if ($data['image']) {
            $path = $data['image']->store('website-settings', [
                'disk' => 'content_managment',
            ]);

            $first = DB::table('website_settings')->first();
            if (is_null($first)) {
                $id = DB::table('website_settings')->insertGetId([
                    'logo' => $path,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'lang_is_shown' => $data['is_shown'],
                ]);
                if ($id) {
                    $this->showSuccess = true;
                }
            } else {
                DB::table('website_settings')->where('id', $first->id)->update([
                    'logo' => $path,
                    'updated_at' => Carbon::now(),
                    'lang_is_shown' => $data['is_shown'],
                ]);
                $this->showSuccess = true;
            }
        }else {
            DB::table('website_settings')->where('id', $site->id)->update([
                'updated_at' => Carbon::now(),
                'lang_is_shown' => $data['is_shown'],
            ]);
            $this->showSuccess = true;
        }
    }
}
