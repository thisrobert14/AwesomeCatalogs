<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class DeleteCatalog extends Component
{
    public Catalog $catalog;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.catalogs.delete-catalog');
    }

    public function deleteCatalog()
    {
        $this->catalog->delete();
        return redirect()->route('show.catalogs');
    }
}
