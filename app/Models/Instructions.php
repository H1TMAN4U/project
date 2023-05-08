<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    use HasFactory;

    protected $fillable = ['step_number', 'instruction'];

    public function recipes()
{
    return $this->belongsTo(Recipes::class);
}

}
