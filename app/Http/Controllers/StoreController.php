<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('backend.stores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('backend.stores.store');
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
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return response()->view('backend.stores.edit', [
            'store' => Store::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $store = Store::findOrFail(Crypt::decrypt($id));

        if (count($store->coupons) || count($store->products) || count($store->blogs)) {
            if ($store->delete()) {
                return response()->json([
                    'header' => __('Success'),
                    'body' => __('Store deleted successfully'),
                    'icon' => 'success',
                    'title' => __('Success'),
                    'text' => __('Store deleted successfully'),
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'header' => __('Failed!'),
                    'body' => __('Failed to delete the store!'),
                    'icon' => 'error',
                    'title' =>  __('Failed!'),
                    'text' =>  __('Failed to delete the store!'),
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the store, store has some related information!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the store, store has some related information!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
