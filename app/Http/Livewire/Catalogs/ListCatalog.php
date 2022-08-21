<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalog extends Component
{
    public bool $createCatalogResourceModalVisible = false;

    public bool $updateCatalogModalVisible = false;

    public bool $deleteCatalogModalVisible = false;

    public bool $deleteResourceModalVisible = false;

    public bool $updateResourceModalVisible = false;

    protected $listeners = [
        'catalogResourceCreated' => 'catalogResourceCreated',
        'closeCreateCatalogResourceModal' => 'closeCreateCatalogResourceModal',
        'closeUpdateCatalogModal' => 'closeUpdateCatalogModal',
        'closeDeleteCatalogModal' => 'closeDeleteCatalogModal',
        'closeUpdateResourceModal' => 'closeUpdateResourceModal',
        'closeDeleteResourceModal' => 'closeDeleteResourceModal',
    ];

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

    public function showCreateCatalogResourceModal(): void
    {
        $this->createCatalogResourceModalVisible = true;
    }

    public function closeCreateCatalogResourceModal(): void
    {
        $this->createCatalogResourceModalVisible = false;
    }

    public function catalogResourceCreated(): void
    {
        $this->createCatalogResourceModalVisible = false;
    }

    public function showUpdateCatalogModal(): void
    {
        $this->updateCatalogModalVisible = true;
    }

    public function closeUpdateCatalogModal(): void
    {
        $this->updateCatalogModalVisible = false;
    }

    public function showDeleteCatalogModal(): void
    {
        $this->deleteCatalogModalVisible = true;
    }

    public function closeDeleteCatalogModal(): void
    {
        $this->deleteCatalogModalVisible = false;
    }

    public function showUpdateResourceModal(): void
    {
        $this->updateResourceModalVisible = true;
    }

    public function closeUpdateResourceModal(): void
    {
        $this->updateResourceModalVisible = false;
    }

    public function showDeleteResourceModal(): void
    {
        $this->deleteResourceModalVisible = true;
    }

    public function closeDeleteResourceModal(): void
    {
        $this->deleteResourceModalVisible = false;
    }
}
