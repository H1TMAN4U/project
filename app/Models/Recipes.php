<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
    protected $fillable =
    [
    'id',
    'name',
    'duration',
    'description',
    'img',
    'category_id'
    ];

    protected $casts = [
        'disabled' => 'boolean'
    ];
    public function instructions()
    {
        return $this->hasMany(Instructions::class, 'recipe_id');
    }
    public function recipeIngredients()
    {
        return $this->hasMany(IngredientsRecipes::class);
    }
    public function Category()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
    public function changes()
    {
        return $this->hasMany(RecipesChanges::class);
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'ingredients_recipes')
        ->withPivot('amount', 'measures_id')
        ->withTimestamps();
    }
}
