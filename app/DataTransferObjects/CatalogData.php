<?php

namespace App\DataTransferObjects;

use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class CatalogData extends DataTransferObject
{
    public string $title;

    public string $description;

    public User $author;
}