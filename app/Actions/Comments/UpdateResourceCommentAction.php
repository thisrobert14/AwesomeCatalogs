<?php

namespace App\Actions\Comments;

use App\DataTransferObjects\CommentData;
use App\Models\Comment;

class UpdateResourceCommentAction
{
    public function update(Comment $comment, CommentData $data): Comment
    {
        $comment->body = $data->body;
        $comment->commentable()->associate($data->resource);
        $comment->owner()->associate($data->owner);
        $comment->save();

        return $comment;
    }
}