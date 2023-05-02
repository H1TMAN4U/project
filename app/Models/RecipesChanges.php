<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesChanges extends Model
{
    use HasFactory;
    protected $table = 'recipes_changes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable =
    [
    'id',
    'recipes_id',
    'users_id',
    'old',
    'new'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recipe()
    {
        return $this->belongsTo(Recipes::class);
    }
}
