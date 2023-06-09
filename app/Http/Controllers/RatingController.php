<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $recipeId = $request->input('recipes_id');

        $rating = DB::table('rating')
        ->where('recipes_id', $recipeId)
        ->where('users_id', $userId)
        ->updateOrInsert(
            ['users_id' => $userId, 'recipes_id' => $recipeId],
            ['rating' => $request->rating]
        );
        return response()->json($rating);
    }
}
