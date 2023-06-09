<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    public $incrementing = true;
    public $timestamp = false;

    protected $fillable =
    [
    'users_id',
    'recipes_id',
    ];
}
