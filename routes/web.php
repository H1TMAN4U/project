<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipesChangesController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::delete('/instructions/{id}', [RecipesController::class, 'destroy_instruction']);
// Route::delete('recipes/{recipe}/ingredients/{ingredient}', [RecipesController::class, 'destroy_ingredients'])->name('ingredient.delete');

Route::get('recipes/changes/{change_id}', [RecipesController::class, 'showChanges'], function () {
    return view('access.admin.recipes.changes');
})->name('recipes-changes');

Route::get('/search-recipes',[RecipesController::class,'search_recipes'], function () {
    return view('access.guest.search-recipes');
})->name('search-recipes');

Route::get('/filter', [RecipesController::class,'search'], function (){
    return view('filtered-search');
})->name('search');
Route::get('/recipes/create', [RecipesController::class, 'search_ingredients']);

Route::get('/', [GuestController::class,'welcome'], function (){
    return view('welcome');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*
    Bookmarks
    */
    Route::get('/bookmarks',[BookmarkController::class,'index'], function () {
    return view('access.user.bookmarks');
    })->name('bookmarks');
    Route::post('/bookmarks/store', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/delete', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    /*
    Rating
    */
    Route::post('/rating', [RatingController::class, 'store']);

    /*
    recipes managament
    */
    Route::get('/recipes/index-recipe', [RecipesController::class, 'index'])->name('index-recipe');
    Route::get('/recipes/create-recipe', [RecipesController::class, 'create'])->name('create-recipe');
    Route::post('/recipes/store-recipe', [RecipesController::class, 'store'])->name('store-recipe');
    Route::get('/recipes/show-recipe/{id}', [RecipesController::class, 'show'])->name('show-recipe');
    Route::get('/recipes/edit-recipe/{id}', [RecipesController::class, 'edit'])->name('edit-recipe');
    Route::put('/recipes/update-recipe/{id}', [RecipesController::class, 'update'])->name('update-recipe');
    Route::delete('/recipes/delete-recipe/{id}', [RecipesController::class, 'destroy'])->name('delete-recipe');

});
// Breakfast
Route::get('/breakfast',[GuestController::class,'breakfast'], function () {
    return view('access.guest.breakfast');
})->name('breakfast');
// Lunch
Route::get('/lunch',[GuestController::class,'lunch'], function () {
    return view('access.guest.lunch');
})->name('lunch');
// Dinner
Route::get('/dinner',[GuestController::class,'dinner'], function () {
    return view('access.guest.dinner');
})->name('dinner');
// Dessert
Route::get('/dessert',[GuestController::class,'dessert'], function () {
    return view('access.guest.dessert');
})->name('dessert');
// Drinks
Route::get('/drinks',[GuestController::class,'drinks'], function () {
    return view('access.guest.drinks');
})->name('drinks');
// Snacks
Route::get('/snacks',[GuestController::class,'snacks'], function () {
    return view('access.guest.snacks');
})->name('snacks');
// all
Route::get('/all',[GuestController::class,'all'], function () {
    return view('access.guest.all');
})->name('all');

/*
Permissions & Roles
*/
Route::middleware(['auth','verified', 'role:Root'])->name('admin.')->prefix('admin')->group(function () {
    // Route::get('/home', [RolesController::class, 'home'])->name('home');
    // Route::get('/show', [RecipeController::class, 'guest_recipe'])->name('show');
    Route::get('/control-recipe',[RecipesController::class,'control_recipes'], function () {
        return view('access.admin.control-recipe');
    })->name('control.recipe');

    Route::resource('/roles', RolesController::class);
    Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RolesController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionsController::class);
    Route::post('/permissions/{permission}/roles', [PermissionsController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionsController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/user/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/user/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/user/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/user/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');


require __DIR__.'/auth.php';
