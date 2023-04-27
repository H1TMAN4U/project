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
    public function index()
    {
        $user=User::all();
        // $recipes = Recipes::select('id', 'name', 'img')->paginate(8);
        $recipes=Recipes::all()->where('users_id', Auth::id());
        return view("access.admin.recipes.index", ['user'=>$user], compact('recipes'));
    }
    public function create()
    {
        $recipes = Recipes::all();
        $category = Category::all();
        $ingredients = Ingredients::all();
        return view("access.admin.recipes.create", ['ingredients' => $ingredients, 'category' => $category, 'recipes' => $recipes]);
    }
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
    public function show($id)
    {
        $ingredients = Ingredients::orderBy('name')->first();
        // $rating=Rating::all()->first();
        $rating = DB::table('rating')->where('recipes_id', $id)->value('rating');
        $recipes=Recipes::all()->where('id',$id)->first();
        return view('access.admin.recipes.show',
        compact('recipes','ingredients','rating'));
    }
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
    public function filter(){
        $category=Category::all();
        $user=User::all();
        $recipes=Recipes::all();
        $ingredients=Ingredients::all();
        return view('filtered-search',
        compact('category','user','recipes','ingredients'));
    }
    public function search(Request $request)
    {
    // retrieve the input and select values from the form
    $recipe_category=Category::all();
    $user=User::all();
    $recipes=Recipes::all();
    $recipe_ingredients=Ingredients::all();
    $keyword = $request->input('keyword');
    $category = $request->input('category');
    $user_id = $request->input('user_id');
    $ingredient_ids = $request->input('ingredient_ids');
    $sort = $request->input('sort');
    $query = Recipes::query();
    if (!empty($keyword)) {
        $query->where(function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
                //   ->orWhere('description', 'like', "%$keyword%")
                //   ->orWhere('instructions', 'like', "%$keyword%");
        });
    }
    if (!empty($category)) {
        $query->where('category_id', $category);
    }
    if (!empty($user_id)) {
        $query->where('user_id', $user_id);
    }
    if (!empty($ingredient_ids)) {
        $query->whereHas('ingredients', function ($query) use ($ingredient_ids) {
            $query->whereIn('ingredients.id', $ingredient_ids);
        });
    }
    if (!empty($sort)) {
        if ($sort == 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sort == 'name_desc') {
            $query->orderBy('name', 'desc');
        } elseif ($sort == 'created_at_asc') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'created_at_desc') {
            $query->orderBy('created_at', 'desc');
        }
    }
    $recipes = $query->get();
    return view('filtered-search', ['recipes' => $recipes],
    compact('recipe_category','recipes','user','recipe_ingredients'));
}

}
