<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalog extends Component
{
    public bool $createCatalogResourceModalVisible = false;

    public bool $updateCatalogModalVisible = false;

    protected $listeners = [
        'catalogResourceCreated' => 'catalogResourceCreated',
        'closeCreateCatalogResourceModal' => 'closeCreateCatalogResourceModal',
        'closeUpdateCatalogModal' => 'closeUpdateCatalogModal',

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
}
