<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable =
    [
    'users_id',
    'recipes_id',
    ];
}
