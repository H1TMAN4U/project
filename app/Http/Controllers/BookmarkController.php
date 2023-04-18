<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use App\Models\Recipes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recipes = Recipes::all();
        // $bookmarks = Bookmark::all();
        $bookmarks=DB::table('bookmarks')->where('bookmarks.users_id',Auth::user()->id)
        ->join('recipes','bookmarks.recipes_id','=','recipes.id')
        ->join('rating','rating.recipes_id','=','recipes.id')->paginate(5);
        // return dd($bookmarks);
        return view("access.user.bookmarks",['recipes'=>$recipes],compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'users_id' => 'required|integer',
            'recipes_id' => 'required|integer',
          ]);
          $bookmarks = new Bookmarks();
          $bookmarks->users_id = $request->input('users_id');
          $bookmarks->recipes_id = $request->input('recipes_id');
          $bookmarks->save();
          return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipe, $id)
    {
        return view('recipes.show', compact('recipes'));
        $user = User::findOrFail($id);
        $recipes = Recipes::where('users_id', $id)->first();
        return view('users.show', compact('user', 'recipes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $bookmark=Bookmarks::where('users_id', $request->users_id)->where('recipes_id', $request->recipes_id)->delete();
        // return redirect()->route('bookmarks');
    }
}
