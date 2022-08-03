<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Catalog\UpdateCatalogAction;
use App\Models\Catalog;
use Livewire\Component;
use App\DataTransferObjects\CatalogData;

class ListCatalog extends Component
{
    public $title;

    public $description;

    public Catalog $catalog;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
        $this->title = $catalog->title;
        $this->description = $catalog->description;
    }

    public function render()
    {
        return view('livewire.catalogs.list-catalog');
    }
}
