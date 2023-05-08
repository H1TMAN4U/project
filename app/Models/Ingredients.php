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
    ];
    public function recipes()
    {
        return $this->belongsTo(Recipes::class);
    }
}
