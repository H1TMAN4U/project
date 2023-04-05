<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class GuestController extends Controller
{
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
    public function all()
    {
        $recipes=Recipes::all();
        return view("access.guest.all", compact("recipes"));
    }
    public function recipes_id($id)
    {
        $id=Recipes::where($id);
        return view("access.show-full");
    }
}
