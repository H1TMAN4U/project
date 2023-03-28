<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Recipes;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\RedirectResponse;
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
        $recipes = Recipes::select('id', 'name', 'img')->paginate(8);
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
        $recipes->ingredients = $request->input('ingredients');
        $recipes->descriptions = $request->descriptions;
        $recipes->instructions = $request->instructions;
        $recipes->img = $file_name;
        $recipes->category_id = $request->category_id;
        $recipes->users_id = $users_id;
        $recipes->save();
        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $RecipeData= Recipes::find($id);
        // $ingredient= Ingredients::orderBy('name', 'asc')->get();
        $category = Recipes::with('getCategory')->get();
        $recipes = DB::table("recipes")->where('id', $id)->get();
        return view("access.admin.recipes.show",
            ["recipes" => $recipes, "category" => $category],
            compact('recipes')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipes $recipe)
    {
        $ingredients = Ingredients::all();
        $category = Category::all();
        return view("access.admin.recipes.edit",
            ['ingredients' => $ingredients, 'category' => $category],
            compact('recipe')
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
        $request->validate([
            'img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:
            min_width=100,min_height=100,max_width=5000,max_height=5000'
        ]);
        $img = $request->hidden_img;
        if ($request->img != '') {
            $img = time() . '.' . request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images'), $img);
        }
        $recipes = Recipes::find($request->hidden_id);
        $recipes->name = $request->name;
        $recipes->ingredients = $request->input('ingredients');
        $recipes->descriptions = $request->descriptions;
        $recipes->instructions = $request->instructions;
        $recipes->img = $img;
        $recipes->save();
        return redirect()->route('recipes.index')->with('success', 'recipe Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipes,$id )
    {
        $recipes=Recipes::find($id);
        $recipes->delete();
        return redirect()->route('recipes.index')->with('success', 'Student Data deleted successfully');
    }
    public function guest_recipes(Recipes $recipes)
    {
        $recipes = Recipes::all();
        $category = Recipes::with('getCategory')->get();
        $data = Recipes::latest()->paginate(5);

        return view("access.admin.recipes.show",
            ["recipes" => $recipes, "category" => $category],
            compact('data')
        );
    }
    public function IDrecipe($id)
    {
        $RecipeData = Recipes::find($id);
        $ingredients = Ingredients::orderBy('name')->get();
        $recipes = Recipes::with('getCategory')->where('id', $id)->get();
        return view("access.show-full",
            ["recipes" => $recipes, "ingredients" => $ingredients],
            compact('recipes')
        );
    }

    public function search_recipes()
    {
        $search_text=$_GET["search-recipes"];
        $data = Recipes::where('name','LIKE', '%'.$search_text.'%')->get();
        return view('recipes.search-recipes',
        compact('data'));
    }
    public function bookmarks()
    {
        $recipes = Recipes::all();
        return view("access.user.bookmarks", compact('recipes'));
    }
    public function destroy_bookmark(Recipes $recipes,$id )
    {
        $recipes=Recipes::find($id)->delete();
        // return dd($recipes);
        return redirect()->route('bookmarks')->with('success', 'Student Data deleted successfully');
    }

}
