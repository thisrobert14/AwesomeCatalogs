<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Catalog\DeleteCatalogAction;
use App\Models\Catalog;
use Livewire\Component;

class DeleteCatalogModal extends Component
{
    public Catalog $catalog;

    public bool $confirmDelete = false;


    public function render()
    {
        return view('livewire.catalogs.delete-catalog-modal');
    }

    public function showConfirmationDeleteCatalogModal(): void
    {
        $this->confirmDelete = true;
    }

    public function closeConfirmationDeleteCatalogModal(): void
    {
        $this->confirmDelete = false;
    }

    public function deleteCatalog()
    {
        resolve(DeleteCatalogAction::class)->delete($this->catalog);

        return redirect()->route('show.catalogs');
    }
}
