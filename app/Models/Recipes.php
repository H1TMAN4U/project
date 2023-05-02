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

    protected $casts = [
        'disabled' => 'boolean'
    ];

    public function getCategory()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }
}
