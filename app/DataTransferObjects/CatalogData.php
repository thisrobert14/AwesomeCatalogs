<?php

namespace App\DataTransferObjects;

use App\Enums\CatalogCategoryEnum;
use App\Models\Photo;
use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class CatalogData extends DataTransferObject
{
    public string $title;

    public string $description;

    public User $author;

    public ?string $photo;

    public CatalogCategoryEnum $category;
}