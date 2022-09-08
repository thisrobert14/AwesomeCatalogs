<?php

namespace App\DataTransferObjects;

use App\Models\Catalog;
use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class ResourceData extends DataTransferObject
{
    public string $title;

    public string $description;

    public Catalog $catalog;

    public User $author;
}