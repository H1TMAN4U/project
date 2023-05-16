<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientsRecipes extends Model
{
    use HasFactory;
    protected $table = 'ingredients_recipes';

    protected $fillable =
    [
    'amount',
    'measures_id',
    'ingredients_id',
    'recipes_id',
    ];
    public function measure()
    {
        return $this->belongsTo(Measure::class, 'measures_id');
    }
}
