<?php

namespace App\DataTransferObjects;

use App\Models\Catalog;
use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class CommentData extends DataTransferObject
{
    public string $body;

    public Catalog $catalog;

    public User $owner;
}