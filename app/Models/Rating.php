<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    public $timestamp = true;
    protected $keyType = 'string'; // or 'int' if recipes_id is an integer

    protected $fillable =
    [
    'rating',
    'review',
    'recipes_id',
    'users_id'
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipes_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
