<?php

namespace App\Actions\Comments;

use App\Models\Comment;

class DeleteResourceCommentAction
{
    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}