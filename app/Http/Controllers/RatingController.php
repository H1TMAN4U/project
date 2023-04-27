<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $recipeId = $request->input('recipes_id');
        $rating = Rating::updateOrCreate(
            ['users_id' => $userId, 'recipes_id' => $recipeId],
            ['rating' => $request->input('rating'), 'review' => $request->input('review')]
        );
        return response()->json($rating);
    }
}
