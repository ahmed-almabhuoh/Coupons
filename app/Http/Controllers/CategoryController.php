<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('backend.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('backend.categories.store');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return response()->view('backend.categories.edit', [
            'category' => Category::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail(Crypt::decrypt($id));

        if (count($category->coupons) || count($category->products) || count($category->blogs)) {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the category!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Category cannot delete with contains some data!'),
            ], Response::HTTP_BAD_REQUEST);
        }
        //
        if ($category->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Category deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Category deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the category!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the category!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
