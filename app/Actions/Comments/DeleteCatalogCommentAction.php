<?php

namespace App\Actions\Comments;

use App\Models\Comment;

class DeleteCatalogCommentAction
{
    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}