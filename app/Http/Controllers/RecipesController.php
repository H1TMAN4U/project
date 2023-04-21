<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Rating;
use App\Models\Recipes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        // $recipes = Recipes::select('id', 'name', 'img')->paginate(8);
        $recipes=Recipes::all()->where('users_id', Auth::id());
        return view("access.admin.recipes.index", ['user'=>$user], compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipes = Recipes::all();
        $category = Category::all();
        $ingredients = Ingredients::all();
        return view("access.admin.recipes.create", ['ingredients' => $ingredients, 'category' => $category, 'recipes' => $recipes]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = time() . '.' . request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images'), $file_name);
        $users_id = Auth::id();

        $recipes = new Recipes;
        $recipes->name = $request->name;
        // $recipes->ingredients = $request->input('ingredients');
        $recipes->descriptions = $request->descriptions;
        $recipes->instructions = $request->instructions;
        $recipes->img = $file_name;
        $recipes->category_id = $request->category_id;
        $recipes->users_id = $users_id;
        $recipes->save();

        $recipes->ingredients()->attach($request->ingredients);


        return redirect()->route('index-recipe');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ingredients = Ingredients::orderBy('name')->first();
        // $rating=Rating::all()->first();
        $rating = DB::table('rating')->where('recipes_id', $id)->value('rating');
        $recipes=Recipes::all()->where('id',$id)->first();
        return view('access.admin.recipes.show',
        compact('recipes','ingredients','rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredients = Ingredients::all();
        $category = Category::all();
        $recipes = Recipes::find($id);
        $selectedIngredients = DB::table('ingredients')
            ->select('ingredients.id')
            ->join('ingredients_recipes', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->where('ingredients_recipes.recipes_id', $id)
            ->pluck('id')
            ->toArray();
        return view("access.admin.recipes.edit",
            compact('recipes', 'category', 'ingredients', 'selectedIngredients')
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipes   $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipes)
    {
        $img = $request->hidden_img;
        if ($request->img != '') {
            $img = time() . '.' . request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images'), $img);
        }
        $recipes = Recipes::find($request->hidden_id);
        $recipes->name = $request->name;
        // $recipes->ingredients = $request->input('ingredients');
        $recipes->descriptions = $request->descriptions;
        $recipes->instructions = $request->instructions;
        $recipes->img = $img;
        $recipes->approved = $request->approved;
        $recipes->save();
        $ingredients = $request->ingredients;
        $recipes->ingredients()->sync($ingredients);

        return redirect()->route('index-recipe')->with('success', 'recipe Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $recipes = Recipes::findOrFail($id);
        $recipes->delete();

        return response()->json(['message' => 'Recipe deleted successfully']);
    }

    public function search_recipes()
    {
        $search_text=$_GET["search-recipes"];
        $recipes = Recipes::where('name','LIKE', '%'.$search_text.'%')->get();
        return view('access.guest.search-recipes',

        compact('recipes'));
    }
}
