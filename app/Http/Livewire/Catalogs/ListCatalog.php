<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalog extends Component
{
    public $title;

    public $description;

    public Catalog $catalog;

    public function mount(Catalog $catalog)
    {
        $this->title = $catalog->title;
        $this->description = $catalog->description;
    }

    public function render()
    {
        return view('livewire.catalogs.list-catalog');
    }
}
