<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content', 'users_id', 'recipes_id', 'parent_comment_id','created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id')->orderBy('created_at', 'asc');
    }
}
