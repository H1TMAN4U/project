<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class GuestController extends Controller
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
    public function dinner()
    {
        $recipes=Recipes::all()->where("category_id", "=", "1");
        return view("access.guest.dinner", compact("recipes"));
    }
    public function lunch()
    {
        $recipes=Recipes::all()->where("category_id", "=", "2");
        return view("access.guest.lunch", compact("recipes"));
    }
    public function breakfast()
    {
        $recipes=Recipes::all()->where("category_id", "=", "3");
        return view("access.guest.breakfast", compact("recipes"));
    }
    public function dessert()
    {
        $recipes=Recipes::all()->where("category_id", "=", "4");
        return view("access.guest.dessert", compact("recipes"));
    }
    public function snacks()
    {
        $recipes=Recipes::all()->where("category_id", "=", "5");
        return view("access.guest.snacks", compact("recipes"));
    }
    public function drinks()
    {
        $recipes=Recipes::all()->where("category_id", "=", "6");
        return view("access.guest.drinks", compact("recipes"));
    }

    public function recipes_id($id)
    {
        $id=Recipes::where($id);
        return view("access.show-full");
    }
}
