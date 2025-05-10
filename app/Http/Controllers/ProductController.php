<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->save();

        $tags = array_merge(
            $request->input('product_experience', [])
        );

        $product->syncTags($tags, $request);

        $product->attachTag($request->input('product_category', null), 'product_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('tags');

        $grouped = $product->tags->groupBy('type');
    
        return array_merge(
            $product->makeHidden('tags')->toArray(),
            ['tags' => $grouped->toArray()]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $tags = array_merge(
            $request->input('product_experience', [])
        );

        $product->syncTags($tags, $request);

        $product->attachTag($request->input('product_category', null), 'product_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->detachAllTags();

        $product->delete();
    }
}
