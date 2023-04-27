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
    public function index(Request $request)
    {
        // $bookmarks = Bookmark::all();
        $bookmarks=DB::table('bookmarks')->where('bookmarks.users_id',Auth::id())
        ->join('recipes','bookmarks.recipes_id','=','recipes.id')->paginate(50);
        return view("access.user.bookmarks",compact('bookmarks'));
    }
    public function store(Request $request)
    {
        //   $request->validate([
        //     'users_id' => 'required|integer',
        //     'recipes_id' => 'required|integer',
        //   ]);
        $bookmarks = new Bookmarks();
        $bookmarks = Bookmarks::updateOrCreate(
            ['users_id' => $request->input('users_id'), 'recipes_id' => $request->input('recipes_id')],
            ['users_id' => $request->input('users_id'), 'recipes_id' => $request->input('recipes_id')]
        );
        $bookmarks->save();
        return response()->json(['success' => true]);
    }
    public function destroy(Request $request)
    {
        $bookmark=Bookmarks::where('users_id', $request->users_id)->where('recipes_id', $request->recipes_id)->delete();
        // return redirect()->route('bookmarks');
    }
}
