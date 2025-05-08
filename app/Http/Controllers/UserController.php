<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ccantimbuhan\LaravelFilters\Filters\Filters;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $results = Filters::apply(User::query(), $request->all(), config('user.filters'));
        
        if ($request->input('paginated')) {
            return response()->json($results->cursorPaginate($request->input('limit')));
        }

        return response()->json($results->get());
    }

    public function options()
    {
        return Filters::options(config('user.filters'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
