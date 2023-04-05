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
    public $timestamp = false;
    protected $fillable =
    [
    'id',
    'name',
    ];
}
