<?php

namespace App\Http\Livewire;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalog extends Component
{
    public function render(Catalog $catalog)
    {
        return view('livewire.catalogs.list-catalog', [
            'catalog' => $catalog
        ]);
    }
}
