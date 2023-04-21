<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable =
    [
    'id',
    'rating',
    'review',
    'recipes_id',
    'users_id'
    ];
}
