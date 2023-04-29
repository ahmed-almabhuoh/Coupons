<?php

namespace App\Http\Controllers;

use App\Models\Aqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class AqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-A&Qs')) {
            abort(403);
        }
        return response()->view('backend.aqs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-A&Q')) {
            abort(403);
        }
        return response()->view('backend.aqs.store');
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
    public function show(Aqs $aqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit-A&Q')) {
            abort(403);
        }
        //
        return response()->view('backend.aqs.edit', [
            'aq' => Aqs::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aqs $aqs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-A&Q')) {
            abort(403);
        }
        $aqs = Aqs::findOrFail(Crypt::decrypt($id));
        //
        if ($aqs->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Aqs deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Aqs deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the aqs!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the aqs!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
