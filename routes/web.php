<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\ReportsController;
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
Route::get('/reports',[ReportsController::class,'index']);

Route::post('/report/{id}', [ReportsController::class, 'store'])->name('report');
Route::delete('/instructions/{id}', [RecipesController::class, 'destroy_instruction']);

Route::get('/search-recipes',[RecipesController::class,'search_recipes'])->name('search-recipes');
Route::get('/search-user', [UserController::class, 'search'])->name('search-user');

Route::get('/filter', [RecipesController::class,'search'])->name('search');

Route::get('/recipes/create', [RecipesController::class, 'search_ingredients']);
Route::get('/', [GuestController::class,'welcome'])->name('/');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/bookmarks',[BookmarkController::class,'index'])->name('bookmarks');
    Route::post('/bookmarks/store', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/delete', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('/rating', [RatingController::class, 'store']);
    Route::get('/recipes/index-recipe', [RecipesController::class, 'index'])->name('index-recipe');
    Route::get('/recipes/create-recipe', [RecipesController::class, 'create'])->name('create-recipe');
    Route::post('/recipes/store-recipe', [RecipesController::class, 'store'])->name('store-recipe');
    Route::get('/recipes/show-recipe/{id}', [RecipesController::class, 'show'])->name('show-recipe');
    Route::get('/recipes/edit-recipe/{id}', [RecipesController::class, 'edit'])->name('edit-recipe');
    Route::put('/recipes/update-recipe/{id}', [RecipesController::class, 'update'])->name('update-recipe');
    Route::delete('/recipes/delete-recipe/{id}', [RecipesController::class, 'destroy'])->name('delete-recipe');
});
Route::get('/breakfast',[GuestController::class,'breakfast'])->name('breakfast');
Route::get('/lunch',[GuestController::class,'lunch'])->name('lunch');
Route::get('/dinner',[GuestController::class,'dinner'])->name('dinner');
Route::get('/dessert',[GuestController::class,'dessert'])->name('dessert');
Route::get('/drinks',[GuestController::class,'drinks'])->name('drinks');
Route::get('/snacks',[GuestController::class,'snacks'])->name('snacks');
Route::get('/all',[GuestController::class,'all'])->name('all');

Route::middleware(['auth','verified', 'role:Root'])->prefix('admin')->group(function () {

    Route::get('/control-recipe',[RecipesController::class,'control_recipes'])->name('control.recipe');

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

Route::get('/fetch-comments/{id}', [CommentController::class, 'fetchComments'])->name('fetch.comments');
Route::match(['post', 'put'], '/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
require __DIR__.'/auth.php';
