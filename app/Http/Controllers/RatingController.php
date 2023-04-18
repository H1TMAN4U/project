<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
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
        $users_id = Auth::id();
        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->review = $request->review;
        $rating->recipes_id = $request->recipes_id;
        $rating->users_id = $users_id;
        $rating->save();
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
        $users_id = Auth::id();
        $rating = Rating::find($request->recipes_id);
        $rating->rating = $request->rating;
        $rating->review = $request->review;
        $rating->recipes_id = $request->recipes_id;
        $rating->users_id = $users_id;
        $rating->save();
        return dd();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
