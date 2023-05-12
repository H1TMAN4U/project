<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientsChanges extends Model
{
    use HasFactory;
    protected $fillable = ['recipes_id', 'users_id', 'old', 'new'];

    public function measure()
    {
        return $this->belongsTo(Recipes::class);
    }
}
