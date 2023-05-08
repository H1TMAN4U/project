<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\IngredientsChanges;
use App\Models\IngredientsRecipes;
use App\Models\Instructions;
use App\Models\Rating;
use App\Models\Recipes;
use App\Models\RecipesChanges;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    public function index()
    {
        $IsDirty = RecipesChanges::all()->first();
        $recipes = Recipes::select('id', 'name', 'img')->paginate(8);
        $recipes = Recipes::where('users_id', Auth::id())->get();
        return view("access.admin.recipes.index", ['IsDirty' => $IsDirty], compact('recipes'));
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

        $user_id = Auth::id();

        $recipe = new Recipes;
        $recipe->name = $request->name;
        $recipe->descriptions = $request->descriptions;
        $recipe->duration = $request->duration;
        $recipe->img = $file_name;
        $recipe->category_id = $request->category_id;
        $recipe->users_id = $user_id;
        $recipe->save();
        // return dd($request->amount);

        // Loop through the array of ingredients and attach them to the recipe
        foreach ($request->ingredients as $ingredient_id) {
            // $recipe->ingredients()->attach($ingredient_id);
            $i=[
                'ingredients_id'=>$ingredient_id,
                'recipes_id'=>$recipe->id,
                'amount'=>(int)$request->amount
            ];
            DB::table('ingredients_recipes')->insert($i);

        }
        foreach ($request->instructions as $step_number => $instruction_text) {
            $instruction = new Instructions;
            $instruction->recipe_id = $recipe->id;
            $instruction->step_number = $step_number;
            $instruction->instruction = $instruction_text;
            $instruction->save();

        }
        return redirect()->route('index-recipe');
    }

    // public function show($id)
    // {
    //     $ingredients = Ingredients::orderBy('name')->first();
    //     // $rating=Rating::all()->first();
    //     $rating = DB::table('rating')->where('recipes_id', $id)->value('rating');
    //     $recipes = Recipes::all()->where('id', $id)->first();
    //     return view(
    //         'access.admin.recipes.show',
    //         compact('recipes', 'ingredients', 'rating')
    //     );
    // }
    public function show($id)
{
    $rating = DB::table('rating')->where('recipes_id', $id)->value('rating');
    $recipe = Recipes::findOrFail($id);
    // $ingredients = $recipe->ingredients()->orderBy('created_at')->get();
    $ingredients = $recipe->ingredients;
    $recipeIngredients = $recipe->ingredients()->withPivot('amount')->get();
    $instructions = Instructions::where('recipe_id', $id)->get();

    return view('access.admin.recipes.show', compact('recipe', 'ingredients', 'instructions', 'recipeIngredients', 'rating'));
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
        $old_recipe_data = $recipes->toArray();
        $recipes->name = $request->name;
        $recipes->descriptions = $request->descriptions;
        $recipes->instructions = $request->instructions;
        $recipes->img = $img;
        $recipes->save();
        $ingredients = $request->ingredients;

        $recipes->ingredients()->sync($ingredients);

        // $new_recipe_data = $recipes->toArray();
        // $changed_attributes = array_diff_assoc($new_recipe_data, $old_recipe_data);

        // $changes_message = '';
        // foreach ($changed_attributes as $attribute => $new_value) {
        //     $old_value = $old_recipe_data[$attribute];
        //     $changes_message .= "The $attribute attribute was changed from '$old_value' to '$new_value'.\n";
        // }
        // $recipes_change = RecipesChanges::updateOrCreate(
        //     ['recipes_id' => $recipes->id],
        //     ['users_id' => Auth::user()->id, 'old' => json_encode($old_recipe_data), 'new' => json_encode($new_recipe_data)]
        // );
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
        $search_text = $_GET["search-recipes"];

        $recipes = Recipes::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return view(
            'access.guest.search-recipes',
            compact('recipes')
        );
    }
    public function filter()
    {
        $category = Category::all();
        $user = User::all();
        $recipes = Recipes::all();
        $ingredients = Ingredients::all();
        return view(
            'filtered-search',
            compact('category', 'user', 'recipes', 'ingredients')
        );
    }
    public function search(Request $request)
    {
        // retrieve the input and select values from the form
        $recipe_category = Category::all();
        $user = User::all();
        $recipes = Recipes::all();
        $recipe_ingredients = Ingredients::all();
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
        return view(
            'filtered-search',
            ['recipes' => $recipes],
            compact('recipe_category', 'recipes', 'user', 'recipe_ingredients')
        );
    }
    public function showChanges()
    {
        $changes = RecipesChanges::get();
        $changeData = [];
        foreach ($changes as $change) {
            $oldData = json_decode($change->old, true);
            $newData = json_decode($change->new, true);
            $changeData[] = [
                'id' => $change->id,
                'old_name' => $oldData['name'] ?? '',
                'new_name' => $newData['name'] ?? '',
                'user_name' => $change->user->name ?? '',
                'created_at' => $change->created_at,
                'updated_at' => $change->updated_at,
            ];
        }
        return view('access.admin.recipes.changes', compact('changeData'));
    }




}
