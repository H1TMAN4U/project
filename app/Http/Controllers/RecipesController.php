<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\IngredientsChanges;
use App\Models\IngredientsRecipes;
use App\Models\Instructions;
use App\Models\Measure;
use App\Models\Rating;
use App\Models\Recipes;
use App\Models\RecipesChanges;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RecipesController extends Controller
{
    public function index()
    {
        $IsDirty = RecipesChanges::all()->first();
        $recipes = Recipes::where('users_id', Auth::id())->paginate(10);
        return view("access.admin.recipes.index", ['IsDirty' => $IsDirty], compact('recipes'));
    }
    public function create()
    {
        $recipes = Recipes::all();
        $measure = Measure::all();
        $category = Category::all();
        $ingredients = Ingredients::all();
        return view("access.admin.recipes.create", ['ingredients' => $ingredients, 'category' => $category, 'recipes' => $recipes, 'measure' => $measure]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'duration' => 'numeric',
            'img' => 'required|image|mimetypes:image/jpeg,image/png,image/gif|dimensions:min_width=700,min_height=500',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
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
        // Loop through the array of ingredients and attach them to the recipe
        $amounts = $request->amount;
        $measures = $request->measure;
        $ingredients = $request->ingredients;
        foreach ($ingredients as $index => $ingredient_id) {
            $amount = $amounts[$index];
            $measure_id = $measures[$index];
            IngredientsRecipes::create([
                'ingredients_id' => $ingredient_id,
                'recipes_id' => $recipe->id,
                'amount' => $amount,
                'measures_id' => $measure_id,
            ]);
        }
        foreach ($request->instructions as $step_number => $instruction_text) {
            $instruction = new Instructions;
            $instruction->recipe_id = $recipe->id;
            $instruction->step_number = $step_number + 1;
            $instruction->instruction = $instruction_text;
            $instruction->save();
        }
        return redirect()->route('index-recipe');
    }
    public function show(Request $request, $id)
    {
        $recipe = Recipes::findOrFail($id);

        $comments = $recipe->comments()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        $rating = DB::table('rating')
            ->join('users', 'users.id', '=', 'rating.users_id')
            ->select('users.name', 'rating.rating')
            ->where('rating.recipes_id', $id)
            ->get();

        $ingredients = DB::table('ingredients_recipes')
            ->join('recipes', 'recipes.id', '=', 'ingredients_recipes.recipes_id')
            ->join('ingredients', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->join('measures', 'measures.id', '=', 'ingredients_recipes.measures_id')
            ->select('ingredients.name as ingredient_name', 'ingredients_recipes.amount', 'measures.name as measure_name')
            ->where('recipes_id',$id)
            ->get();

        $instructions = Instructions::where('recipe_id', $id)->get();
        return view('access.admin.recipes.show', compact('recipe', 'ingredients', 'instructions', 'rating'));
    }

    public function edit($id)
    {
        $measures = Measure::all();
        // $recipe = Recipe::with(['ingredients', 'ingredients.measure'])->findOrFail($id);
        $recipes = Recipes::with(['category', 'instructions', 'recipeIngredients', 'ingredients.measure'])->findOrFail($id);
        $ingredients = Ingredients::all();
        $category = Category::all();
        $instructions = $recipes->instructions;
        $selectedIngredients = $recipes->recipeIngredients->pluck('ingredients_id')->toArray();
        $recipe_ingredients = DB::table('ingredients')
            ->join('ingredients_recipes', 'ingredients.id', '=', 'ingredients_recipes.ingredients_id')
            ->join('measures', 'measures.id', '=', 'ingredients_recipes.measures_id')
            ->select('ingredients.id', 'ingredients.name', 'ingredients_recipes.amount', 'measures.name as measure_name', 'ingredients_recipes.measures_id')
            ->where('ingredients_recipes.recipes_id', $id)
            ->get();
        $recipe_ingredients = $recipe_ingredients->map(function ($ingredient) {
            $ingredient->amount = (float) $ingredient->amount;
            return $ingredient;
        });
        return view("access.admin.recipes.edit", compact(
            'recipes',
            'category',
            'instructions',
            'ingredients',
            'recipe_ingredients',
            'selectedIngredients',
            'measures',
        ));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'duration' => 'numeric',
            'img' => 'required|image|mimetypes:image/jpeg,image/png,image/gif|dimensions:min_width=700,min_height=10000',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipe = Recipes::findOrFail($id);

        // Move image file to public/images folder
        if ($request->hasFile('img')) {
            $file_name = time() . '.' . request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images'), $file_name);
            $recipe->img = $file_name;
        }

        // Update recipe information
        $recipe->name = $request->name;
        $recipe->descriptions = $request->descriptions;
        $recipe->duration = $request->duration;
        $recipe->category_id = $request->category_id;
        $recipe->users_id = Auth::id();
        $recipe->save();


        //  ingredient attaching to table
        $ingredients = $request->input('ingredients', []);
        $amounts = $request->input('amount', []);
        $measures = $request->input('measure', []);

        $recipe->ingredients()->sync([]);

        $ingredientsData = [];

        foreach ($ingredients as $index => $ingredientId) {
            $ingredientsData[$ingredientId] = [
                'amount' => $amounts[$index],
                'measures_id' => $measures[$index],
            ];
        }

        $recipe->ingredients()->sync($ingredientsData);
        // dd($ingredients);
        $updated_instructions = [];
        $step = [];
        foreach ($request->instructions as $step_number => $instruction_text) {
            $step[] = $instruction_text;
        }
        foreach ($step as $step_number => $instruction_text) {
            if (!empty($instruction_text)) {
                $instruction = Instructions::updateOrCreate(
                    ['recipe_id' => $recipe->id, 'step_number' => $step_number + 1],
                    ['instruction' => $instruction_text]
                );
                $updated_instructions[] = $instruction->id;
            }
        }

        $recipe->instructions()->whereNotIn('id', $updated_instructions)->delete();

        return redirect()->route('index-recipe');
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
        $recipes = Recipes::where('name', 'LIKE', '%' . $search_text . '%')->paginate(10);
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
    public function destroy_instruction($id)
    {
        $instruction = Instructions::findOrFail($id);
    }
    public function control_recipes()
    {
        $IsDirty = RecipesChanges::all()->first();
        $recipes = Recipes::paginate(10);
        return view("access.admin.control-recipe",
        ['IsDirty' => $IsDirty], compact('recipes'));
    }


}
