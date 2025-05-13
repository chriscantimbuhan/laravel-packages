<?php

namespace App\Http\Controllers;

use Ccantimbuhan\LaravelRatings\Models\Rating;
use Ccantimbuhan\LaravelRatings\Traits\HasRatingMethods;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    use HasRatingMethods;

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
    public function approval(Request $request, Rating $rating)
    {
        $this->ratingApproval($request, $rating);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        return $rating->load('approvals');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
