<?php

namespace App\Actions\Catalog;

use App\Models\Catalog;

class DeleteCatalogAction
{
    public function delete(Catalog $catalog): void
    {
        $catalog->delete();
    }
}