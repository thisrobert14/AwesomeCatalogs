<?php

namespace App\Actions\Comments;

use App\DataTransferObjects\CommentData;
use App\Models\Comment;

class CreateCatalogCommentAction
{
    public function create(CommentData $data): Comment
    {
        $comment = new Comment();
        $comment->body = $data->body;
        $comment->catalog()->associate($data->catalog);
        $comment->owner()->associate($data->owner);
        $comment->save();

        return $comment;
    }
}