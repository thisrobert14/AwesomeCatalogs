<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Catalog\DeleteCatalogAction;
use App\Models\Catalog;
use Livewire\Component;

class DeleteCatalogModal extends Component
{
    public Catalog $catalog;

    public bool $removeCatalogModalVisible = false;


    public function render()
    {
        return view('livewire.catalogs.delete-catalog-modal');
    }

    public function showRemoveCatalogModal(): void
    {
         $this->removeCatalogModalVisible = true;
    }
 
    public function closeRemoveCatalogModal(): void
    {
         $this->removeCatalogModalVisible = false;
    }

    public function deleteCatalog()
    {
        resolve(DeleteCatalogAction::class)->delete($this->catalog);
        $this->emit('catalogDeleted');
        return redirect()->route('show.catalogs');
    }
}
