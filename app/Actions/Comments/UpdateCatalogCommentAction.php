<?php

namespace App\Actions\Comments;

use App\DataTransferObjects\CommentData;
use App\Models\Comment;

class UpdateCatalogCommentAction
{
    public function update(Comment $comment, CommentData $data): Comment
    {
        $comment->body = $data->body;
        $comment->commentable()->associate($data->catalog);
        $comment->owner()->associate($data->owner);
        $comment->save();

        return $comment;
    }
}