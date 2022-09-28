<?php

namespace App\Enums;

enum CatalogCategoryEnum: string
{
    case SOFTWARE = 'software';

    case BACKEND = 'back-end';

    case FRONTEND = 'front-end';
}