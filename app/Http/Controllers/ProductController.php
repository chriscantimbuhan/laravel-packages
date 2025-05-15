<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Ccantimbuhan\LaravelAuditLogs\Traits\HasAuditLogMethods;
use Ccantimbuhan\LaravelMedia\Facade\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use HasAuditLogMethods;

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
        Auth::setUser(User::whereKey(1)->first());

        $product = new Product;
        $product->save();

        // $tags = array_merge(
        //     $request->input('product_experience', [])
        // );

        // $product->syncTags($tags, $request);

        // $product->attachTag($request->input('product_category', null), 'product_category');

        if ($request->file('image')) {
            Media::store($request->file('image'), $product);
        }

        $this->setLogRequest($request)
            ->setLogModel($product)
            ->setLogRemarks('Create Product')
            ->setLogAction('Login')
            ->storeLog();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['tags', 'approvedRatings', 'media']);

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

    /**
     * Rate product
     */
    public function rate(Product $product)
    {
        $product->rate(5, 'This is a great product');
    }

    /**
     * Average rating of product
     */
    public function averageRating(Product $product)
    {
        return number_format($product->averageRating() ?? 0, 2);
    }
}
