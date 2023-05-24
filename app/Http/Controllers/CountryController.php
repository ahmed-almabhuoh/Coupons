<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-countries')) {
            abort(403);
        }
        return response()->view('backend.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-country')) {
            abort(403);
        }
        return response()->view('backend.countries.store');
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
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        if (!auth()->user()->can('edit-country')) {
            abort(403);
        }
        return response()->view('backend.countries.edit', [
            'country' => Country::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-country')) {
            abort(403);
        }
        $country = Country::findOrFail(Crypt::decrypt($id));

        if (count($country->stores)) {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the country!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Country cannot delete with contains some data!'),
            ], Response::HTTP_BAD_REQUEST);
        }
        //
        if ($country->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Country deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Country deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the country!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the country!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function updateSelectedCountry($country_id)
    {
        // Store the selected country in a cookie
        Cookie::queue('new_selected_country', $country_id . '', 10080);

        return [
            'country' => Cookie::get('new_selected_country'),
        ];
    }
}
