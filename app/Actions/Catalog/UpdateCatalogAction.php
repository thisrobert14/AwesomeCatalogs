<?php

namespace App\Actions\Catalog;

use App\DataTransferObjects\CatalogData;
use App\Models\Catalog;

class UpdateCatalogAction
{
    public function update(Catalog $catalog, CatalogData $data): Catalog
    {
        $catalog->title = $data->title;
        $catalog->description = $data->description;
        $catalog->author()->associate($data->author);
        $catalog->photo = $data->photo;
        $catalog->save();

        return $catalog;
    }
}