<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-articles')) {
            abort(403);
        }
        return response()->view('backend.articals.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->can('create-article')) {
            abort(403);
        }
        return response()->view('backend.articals.store', [
            'blogs' => Blog::get(),
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
    public function show(Artical $artical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        if (!auth()->user()->can('edit-article')) {
            abort(403);
        }
        return response()->view('backend.articals.edit', [
            'artical' => Artical::findOrFail(Crypt::decrypt($id)),
            'blogs' => Blog::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artical $artical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-article')) {
            abort(403);
        }
        $artical = Artical::findOrFail(Crypt::decrypt($id));
        //
        if ($artical->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Artical deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Artical deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the artical!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the artical!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
