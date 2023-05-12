<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'recipes_id';
    public $timestamp = true;
    protected $fillable =
    [
    'rating',
    'review',
    'recipes_id',
    'users_id'
    ];
}
