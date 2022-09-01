<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class CatalogComments extends Component
{
    public Catalog $catalog;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.catalogs.catalog-comments', [
            'comments' => $this->catalog->comments,
        ]);
    }
}
