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
        if ($blog->articals()->exists()) {
            $message = __('Failed to delete the blog, blog has some related information!');
            $status = Response::HTTP_BAD_REQUEST;
        } elseif ($blog->delete()) {
            $message = __('Blog deleted successfully');
            $status = Response::HTTP_OK;
        } else {
            $message = __('Failed to delete the blog!');
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
