<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
        if (!auth()->user()->can('view-stores')) {
            abort(403);
        }
        return response()->view('backend.stores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-store')) {
            abort(403);
        }
        return response()->view('backend.stores.store', [
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
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit-store')) {
            abort(403);
        }
        //
        return response()->view('backend.stores.edit', [
            'store' => Store::findOrFail(Crypt::decrypt($id)),
            'countries' => Country::active()->get(),
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
        if (!auth()->user()->can('delete-store')) {
            abort(403);
        }
        //
        $store = Store::findOrFail(Crypt::decrypt($id));

        if ($store->coupons()->exists() || $store->products()->exists() || $store->blogs()->exists()) {
            $message = __('Failed to delete the store, store has some related information!');
            $status = Response::HTTP_BAD_REQUEST;
        } elseif ($store->delete()) {
            $message = __('Store deleted successfully');
            $status = Response::HTTP_OK;
        } else {
            $message = __('Failed to delete the store!');
            $status = Response::HTTP_BAD_REQUEST;
        }

        return response()->json([
            'header' => __($status === Response::HTTP_OK ? 'Success' : 'Failed!'),
            'body' => $message,
            'icon' => $status === Response::HTTP_OK ? 'success' : 'error',
            'title' => __($status === Response::HTTP_OK ? 'Success' : 'Failed!'),
            'text' => $message,
        ], $status);
    }
}
