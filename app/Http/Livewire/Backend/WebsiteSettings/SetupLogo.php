<?php

namespace App\Http\Livewire\Backend\WebsiteSettings;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SetupLogo extends Component
{
    use WithFileUploads;

    public $image;
    public $color;
    public $is_shown = false;
    public $showSuccess = false;
    protected $replaced_str;
    protected $new_clr;
    public $show_store_items;

    public function mount()
    {
        $site = DB::table('website_settings')->first();
        $this->color = $site->color;
        $this->is_shown = $site->lang_is_shown;
        $this->show_store_items = $site->show_store_items;
    }

    public function render()
    {
        if (!auth()->user()->can('manage-website')) {
            abort(403);
        }
        return view('livewire.backend.website-settings.setup-logo');
    }

    public function store()
    {
        if (!auth()->user()->can('manage-website')) {
            abort(403);
        }
        $site = DB::table('website_settings')->first();
        $this->replaced_str = $site->color;

        $data = $this->validate([
            'image' => 'nullable',
            'is_shown' => 'required|boolean',
            'color' => 'required|string',
            'show_store_items' => 'required|boolean',
        ]);
        $this->new_clr = $data['color'];

        // Update CSS Files
        $this->changeColors();

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
                    'color' => $data['color'],
                    'lang_is_shown' => $data['is_shown'],
                    'show_store_items' => $data['show_store_items'],
                ]);
                $this->showSuccess = true;
            } else {
                DB::table('website_settings')->where('id', $first->id)->update([
                    'logo' => $path,
                    'color' => $data['color'],
                    'updated_at' => Carbon::now(),
                    'lang_is_shown' => $data['is_shown'],
                    'show_store_items' => $data['show_store_items'],
                ]);
                $this->showSuccess = true;
            }
        } else {
            DB::table('website_settings')->where('id', $site->id)->update([
                'updated_at' => Carbon::now(),
                'color' => $data['color'],
                'lang_is_shown' => $data['is_shown'],
                'show_store_items' => $data['show_store_items'],
            ]);
            $this->showSuccess = true;
        }
    }

    // Change site colors function
    protected function changeColors()
    {
        // Primary Color
        $file_css_pages = file_get_contents(public_path('front/pages/css/master.css'));
        file_put_contents(public_path('front/pages/css/master.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        $file_css_pages = file_get_contents(public_path('front/pages/css/master-rtl.css'));
        file_put_contents(public_path('front/pages/css/master-rtl.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        $file_css_pages = file_get_contents(public_path('front/client/css/master.css'));
        file_put_contents(public_path('front/client/css/master.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        $file_css_pages = file_get_contents(public_path('front/client/css/master-rtl.css'));
        file_put_contents(public_path('front/client/css/master-rtl.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        $file_css_pages = file_get_contents(public_path('front/authorization/css/master.css'));
        file_put_contents(public_path('front/authorization/css/master.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        $file_css_pages = file_get_contents(public_path('front/authorization/css/master-rtl.css'));
        file_put_contents(public_path('front/authorization/css/master-rtl.css'), str_replace($this->replaced_str, $this->new_clr, $file_css_pages));

        Artisan::call('cache:clear');
    }
}
