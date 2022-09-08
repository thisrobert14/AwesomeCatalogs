<?php

namespace App\Actions\Comments;

use App\DataTransferObjects\CommentData;
use App\Models\Comment;

class CreateResourceCommentAction
{
    public function create(CommentData $data): Comment
    {
        $comment = new Comment();
        $comment->body = $data->body;
        $comment->commentable()->associate($data->resource);
        $comment->owner()->associate($data->owner);
        $comment->save();

        return $comment;
    }
}