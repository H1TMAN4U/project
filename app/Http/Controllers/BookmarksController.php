<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipes::all();
        return view("access.user.bookmarks", compact('recipes'));
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
        // $recipes = new Recipes;
        // $recipes->recipes_id = $request->recipes_id;
        // $recipes->users_id = $request->users_id;
        // $recipes->stars = $request->stars;
        // $recipes->marked = $request->marked;
        // $recipes->save();
        // return redirect()->route('recipes.index');
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
        $recipes=Recipes::find($id)->delete();
        return redirect()->route('bookmarks')->with('success', 'Student Data deleted successfully');
    }
}
