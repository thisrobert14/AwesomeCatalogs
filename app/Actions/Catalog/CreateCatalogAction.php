<?php

namespace App\Actions\Catalog;

use App\DataTransferObjects\CatalogData;
use App\Models\Catalog;

class CreateCatalogAction
{
    public function create(CatalogData $data): Catalog
    {
        $catalog = new Catalog();
        $catalog->title = $data->title;
        $catalog->description = $data->description;
        $catalog->author()->associate($data->author);        
        $catalog->photo = $data->photo;
        $catalog->category = $data->category;

        $catalog->save();

        return $catalog;
    }
}
