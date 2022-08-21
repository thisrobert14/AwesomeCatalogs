<?php

namespace App\DataTransferObjects;

use App\Models\Catalog;
use Spatie\DataTransferObject\DataTransferObject;

class ResourceData extends DataTransferObject
{
    public string $title;

    public string $description;

    public Catalog $catalog;
}