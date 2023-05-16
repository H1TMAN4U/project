<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function dinner()
    {
        $recipes=Recipes::where("category_id", "=", "1")->paginate(10);
        return view("access.guest.dinner", compact("recipes"));
    }
    public function lunch()
    {
        $recipes=Recipes::where("category_id", "=", "2")->paginate(10);
        return view("access.guest.lunch", compact("recipes"));
    }
    public function breakfast()
    {
        $recipes=Recipes::where("category_id", "=", "3")->paginate(10);
        return view("access.guest.breakfast", compact("recipes"));
    }
    public function dessert()
    {
        $recipes=Recipes::where("category_id", "=", "4")->paginate(10);
        return view("access.guest.dessert", compact("recipes"));
    }
    public function snacks()
    {
        $recipes=Recipes::where("category_id", "=", "5")->paginate(10);
        return view("access.guest.snacks", compact("recipes"));
    }
    public function drinks()
    {
        $recipes=Recipes::where("category_id", "=", "6")->paginate(10);
        return view("access.guest.drinks", compact("recipes"));
    }
    public function all()
    {
        $recipes=Recipes::paginate(10);
        return view("access.guest.all", compact("recipes"));
    }
    public function recipes_id($id)
    {
        $id=Recipes::where($id);
        return view("access.show-full");
    }
}
