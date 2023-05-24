<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-coupons')) {
            abort(403);
        }
        return response()->view('backend.coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-coupon')) {
            abort(403);
        }
        return response()->view('backend.coupons.store', [
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
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
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        if (!auth()->user()->can('edit-coupon')) {
            abort(403);
        }
        return response()->view('backend.coupons.edit', [
            'coupon' => Coupon::findOrFail(Crypt::decrypt($id)),
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
            'countries' => Country::active()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-coupon')) {
            abort(403);
        }
        $coupon = Coupon::findOrFail(Crypt::decrypt($id));
        //
        if ($coupon->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Coupon deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Coupon deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the coupon!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the coupon!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
