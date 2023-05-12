<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    use HasFactory;
    protected $table = 'instructions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['step_number', 'instruction', 'recipe_id'];

    public function recipes()
{
    return $this->belongsTo(Recipes::class);
}

}
