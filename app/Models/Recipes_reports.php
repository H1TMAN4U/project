<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes_reports extends Model
{
    use HasFactory;
    protected $table = 'recipes_reports';
    public $timestamps = true;

    protected $fillable = [
        'report_id',
        'recipe_id',
        'user_id',
    ];

    public function report()
    {
        return $this->belongsTo(Reports::class, 'report_id');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipes::class, 'recipe_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
