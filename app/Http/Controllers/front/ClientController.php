<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Aqs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //
    public function getAboutPage()
    {
        return response()->view('frontend.client.about');
    }

    public function getBlogsPage()
    {
        return response()->view('frontend.client.blogs', [
            'blogs' => Blog::active()->get(),
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
        ]);
    }

    public function getFqsPage()
    {
        return response()->view('frontend.client.fqs', [
            'fqs' => Aqs::active()->get(),
        ]);
    }

    public function recieveContactRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);
        //
        $id = DB::table('contact_us')->insertGetId([
            'email' => $request->post('email'),
            'message' => $request->post('message'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with([
            'message' => $id ? 'Thank you for your effort, you work hard to contact with you via your email " ' . $request->post('email') . '" so soon :)' : 'Failed to recieve your contact request, please try again later!',
            'code' => $id ? 200 : 401,
        ]);
    }
}
