<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\Recipes_reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReportsController extends Controller
{
    public function index()
    {
        $recipes = Recipes::has('reports')->with('reports')->paginate(10);

        // return dd($recipes);
        return view('access.admin.reports.recipes-reports', compact('recipes'));
    }

    public function store(Request $request, Recipes $id){
        foreach($request->report_id as $key => $value){
            $recipe = new Recipes_reports;
            $recipe->report_id = $value;
            $recipe->recipe_id = $id->id;
            $recipe->user_id = Auth::id();
            $recipe->save();
        }
        return Redirect::back();
    }
}
