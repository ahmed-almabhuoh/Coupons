<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-products')) {
            abort(403);
        }
        return response()->view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-product')) {
            abort(403);
        }
        return response()->view('backend.products.store', [
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
            'coupons' => Coupon::active()->get(),
            'countries' => Country::active()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        if (!auth()->user()->can('edit-product')) {
            abort(403);
        }
        return response()->json([
            'product' => Product::active()->where('id', Crypt::decrypt($id))->first(),
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit-product')) {
            abort(403);
        }
        return response()->view('backend.products.edit', [
            'coupons' => Coupon::active()->get(),
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
            'product' => Product::findOrFail(Crypt::decrypt($id)),
            'images' => DB::table('product_images')->where('product_id', Crypt::decrypt($id))->get(),
            'countries' => Country::active()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-product')) {
            abort(403);
        }
        $product = Product::findOrFail(Crypt::decrypt($id));
        DB::table('favorites')->where('product_id', $product->id)->delete();
        //
        if ($product->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Product deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Product deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the product!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the product!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
