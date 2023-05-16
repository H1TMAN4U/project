<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesChanges extends Model
{
    use HasFactory;
    protected $table = 'recipes_changes';
    protected $fillable = [
        'recipes_id',
        'users_id',
        'old',
        'new'
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipes::class, 'recipes_id');
    }
}

