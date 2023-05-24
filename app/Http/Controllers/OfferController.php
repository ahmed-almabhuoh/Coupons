<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-offers')) {
            abort(403);
        }
        return response()->view('backend.offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-offer')) {
            abort(403);
        }
        return response()->view('backend.offers.store', [
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
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit-offer')) {
            abort(403);
        }
        return response()->view('backend.offers.edit', [
            'offer' => Offer::findOrFail(Crypt::decrypt($id)),
            'countries' => Country::active()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-offer')) {
            abort(403);
        }
        $offer = Offer::findOrFail(Crypt::decrypt($id));
        //
        if ($offer->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Offer deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Offer deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the offer!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the offer!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
