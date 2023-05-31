<?php

namespace App\Http\Livewire;
use App\Models\Comment;

use Livewire\Component;

class Comments extends Component
{
    public $content;
    public $recipeId;
    public $replyTo;
    public $replyContent;

    public $editingCommentId;
    public $editingCommentContent;
    public $editingChildCommentId;
    public $editingChildCommentContent;

    public function mount($recipeId)
    {
        $this->recipeId = $recipeId;
    }

    public function render()
    {
        $comments = Comment::where('recipes_id', $this->recipeId)
            ->with('user')
            ->get();

        return view('livewire.comments', compact('comments'));
    }

    public function addComment()
    {
        // Validate the comment content if necessary
        Comment::create([
            'content' => $this->content,
            'users_id' => auth()->user()->id,
            'recipes_id' => $this->recipeId,
            'parent_comment_id' => $this->replyTo, // Set the parent comment ID
        ]);
        $this->content = '';
        // Refresh the comments list
        $this->emit('commentAdded');
    }
    public function showReplyForm($commentId)
    {
        $this->replyTo = $commentId;
        $this->replyContent = '';
    }

    public function cancelReply()
    {
        $this->replyTo = null;
        $this->replyContent = '';
    }

    public function addReply()
    {
        // Validate the reply content if necessary
        Comment::create([
            'content' => $this->replyContent,
            'users_id' => auth()->user()->id,
            'recipes_id' => $this->recipeId,
            'parent_comment_id' => $this->replyTo,
        ]);
        $this->replyTo = null;
        $this->replyContent = '';
        // Refresh the comments list
        $this->emit('commentAdded');
    }



    public function editComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $this->editingCommentId = $commentId;
            $this->editingCommentContent = $comment->content;
        }
    }
    public function cancelUpdate()
    {
        $this->resetEditForm();
    }


    public function updateComment()
    {
        $comment = Comment::find($this->editingCommentId);
        if ($comment) {
            $comment->update([
                'content' => $this->editingCommentContent,
            ]);
            $this->resetEditForm();
        }
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->delete();
        }
    }

    private function resetEditForm()
    {
        $this->editingCommentId = null;
        $this->editingCommentContent = '';
    }


    public function editChildComment($childCommentId)
    {
        $childComment = Comment::find($childCommentId);

        if ($childComment) {
            $this->editingChildCommentId = $childCommentId;
            $this->editingChildCommentContent = $childComment->content;
        }
    }
    public function cancelChildUpdate()
    {
        $this->resetChildEditForm();
    }

    public function updateChildComment()
    {
        $childComment = Comment::find($this->editingChildCommentId);

        if ($childComment) {
            $childComment->update([
                'content' => $this->editingChildCommentContent,
            ]);

            $this->resetChildEditForm();
        }
    }

    public function deleteChildComment($childCommentId)
    {
        $childComment = Comment::find($childCommentId);

        if ($childComment) {
            $childComment->delete();
        }
    }
    private function resetChildEditForm()
    {
        $this->editingChildCommentId = null;
        $this->editingChildCommentContent = '';
    }
    

}
