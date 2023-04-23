<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('backend.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('backend.blogs.store', [
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
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
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return response()->view('backend.blogs.edit', [
            'blog' => Blog::findOrFail(Crypt::decrypt($id)),
            'categories' => Category::active()->get(),
            'stores' => Store::active()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail(Crypt::decrypt($id));
        //
        if ($blog->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Blog deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Blog deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the blog!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the blog!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
