<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'users_id' => 'required',
            'recipes_id' => 'required',
        ]);

        $parentCommentId = $request->input('parent_comment_id');

        if ($parentCommentId) {
            $parentComment = Comment::findOrFail($parentCommentId);

            $childComment = new Comment([
                'content' => $request->input('content'),
                'users_id' => $request->input('users_id'),
                'recipes_id' => $request->input('recipes_id'),
            ]);

            $parentComment->childComments()->save($childComment);
        } else {
            $comment = Comment::create($request->all());
        }

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
