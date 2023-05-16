<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;
    protected $table = 'ingredients';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable =
    [
        'id',
        'name',
        'amount'
    ];
    // public function recipes()
    // {
    //     return $this->belongsTo(Recipes::class);
    // }
    public function recipes()
    {
        return $this->belongsToMany(Recipes::class, 'ingredients_recipes')
                    ->withPivot('amount', 'measures_id')
                    ->withTimestamps();
    }
    // public function measure()
    // {
    //     return $this->belongsTo(Measure::class, 'measures_id');
    // }
    //     public function recipes()
    // {
    //     return $this->belongsToMany(Recipes::class, 'ingredients_recipes')
    //                 ->withPivot('amount', 'measures_id')
    //                 ->withTimestamps();
    // }
    

    public function measure()
    {
        return $this->belongsTo(Measure::class, 'measures_id');
    }
}
