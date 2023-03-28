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
    'ingredients',
    'description',
    'instructions',
    'img',
    'category_id'
    ];
    
    public function getCategory()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }

    public function setIngredientsAttribute($value)
    {
        $this->attributes['ingredients'] = json_encode($value);
    }

    public function getIngredientsAttribute($value)
    {
        return $this->attributes['ingredients'] = json_decode($value);
    }
}
