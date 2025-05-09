<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Ccantimbuhan\LaravelTags\Models\Tag;
use Ccantimbuhan\LaravelTags\Requests\TagRequest;
use Ccantimbuhan\LaravelTags\Traits\HasTagMethods;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use HasTagMethods;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        return $this->storeTag($request, new ProductCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        return $this->updateTag($request, $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        return $this->destroyTag($tag);
    }
}
