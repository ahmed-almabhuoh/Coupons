<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Aqs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Favorite;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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
            'logo' => DB::table('website_settings')->orderByDesc('created_at')->first()->logo,
        ]);
    }

    public function recieveContactRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:70',
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

    // Offer
    public function getOfferPage()
    {
        $products = Product::active()->with('store')->get();
        foreach ($products as $product) {
            $image_path = DB::table('product_images')->where('product_id', $product->id)->first();
            if (!is_null($image_path))
                $product->setAttribute('image', $image_path->image);
        }

        return response()->view('frontend.client.offers', [
            'offers' => Offer::active()->get(),
            'products' => $products,
        ]);
    }

    // Get a specific product without middleware
    public function getProduct($id)
    {
        $product = Product::with('store')->with('category')->find($id);
        if (!$product) {
            return response()->json([
                'error' => 'Product not found'
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'product' => $product,
        ], Response::HTTP_OK);
    }

    // Get coupons page
    public function getCouponsPage()
    {
        $products = Product::specail()->get();
        foreach ($products as $product) {
            $img = DB::table('product_images')->where('product_id', $product->id)->first();
            $product->setAttribute('image', $img->image);
        }
        return response()->view('frontend.client.coupons', [
            'stores' => Store::active()->get(),
            'coupons' => Coupon::active()->get(),
            'categories' => Category::active()->get(),
            'products' => $products,
        ]);
    }

    // Get a specific coupon
    public function getCoupon($coupon_id)
    {
        return response()->json([
            'coupon' => Coupon::active()->where('id', $coupon_id)->with('store')->with('category')->first(),
        ]);
    }

    // Get home page
    public function getHomePage()
    {
        return response()->view('frontend.client.home', [
            'offers' => Offer::active()->get(),
            'coupons' => Coupon::active()->get(),
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
        ]);
    }

    // Check if the user has the coupon of not
    public function checkUserCoupone($id)
    {
        return response()->json([
            'has_coupon' => Favorite::where([
                ['coupon_id', '=', $id],
                ['user_id', '=', auth()->user()->id]
            ])->exists(),
        ]);
    }

    // Set coupons as activated coupon
    public function setCouponeAsActivated($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        DB::table('coupons')->where('id', $id)->update([
            'activation_count' => $coupon->activation_count + 1,
        ]);
    }

    // Set coupons as inactivated coupon
    public function setCouponeAsInActivated($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        DB::table('coupons')->where('id', $id)->update([
            'inactivation_count' => $coupon->inactivation_count + 1,
        ]);
    }

       // Set products as activated coupon
       public function setProductAsActivated($id)
       {
           $product = DB::table('products')->where('id', $id)->first();
           DB::table('products')->where('id', $id)->update([
               'activation_count' => $product->activation_count + 1,
           ]);
       }

       // Set products as inactivated coupon
       public function setProductAsInActivated($id)
       {
           $product = DB::table('products')->where('id', $id)->first();
           DB::table('products')->where('id', $id)->update([
               'inactivation_count' => $product->inactivation_count + 1,
           ]);
       }

    // Get the articals
    public function getArticalsPage($blog_id)
    {
        $blog = Blog::where('id', Crypt::decrypt($blog_id))->with('articals', function ($query) {
            $query->where('status', 'active');
        })->first();

        $blogs = Blog::active()->get();

        return response()->view('frontend.client.articals', [
            'blog' => $blog,
            'blogs' => $blogs,
        ]);
    }
}
