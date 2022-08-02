<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalog extends Component
{
    public $title;

    public $description;

    public Catalog $catalog;

    public bool $updateCatalogModalVisible = false;

    public bool $deleteCatalogModalVisible = false;

    protected $listeners = [
        'closeUpdateCatalogModal' => 'closeUpdateCatalogModal',
        'closeDeleteCatalogModal' => 'closeDeleteCatalogModal'
    ];

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

    public function showUpdateCatalogModal()
    {
        $this->updateCatalogModalVisible = true;
    }

    public function closeUpdateCatalogModal()
    {
        $this->updateCatalogModalVisible = false;
    }

    public function showDeleteCatalogModal()
    {
        $this->deleteCatalogModalVisible = true;
    }

    public function closeDeleteCatalogModal()
    {
        $this->deleteCatalogModalVisible = false;
    }
}
