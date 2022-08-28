<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use App\Models\Resource;
use Livewire\Component;

class ListCatalog extends Component
{
    public bool $createCatalogResourceModalVisible = false;

    public bool $updateCatalogModalVisible = false;

    public bool $deleteCatalogModalVisible = false;

    public bool $deleteResourceModalVisible = false;

    public ?Resource $resourceToBeUpdated = null;

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

    public $starsCount;

    public $hasStared;

    public function mount(Catalog $catalog, $starsCount)
    {
        $this->catalog = $catalog;
        $this->title = $catalog->title;
        $this->description = $catalog->description;
        $this->starsCount = $starsCount;
        $this->hasStared = $catalog->isStaredByUser(auth()->user());
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

    public function showUpdateResourceModal(string $resourceId): void
    {
        $this->resourceToBeUpdated = Resource::find($resourceId);
    }

    public function closeUpdateResourceModal(): void
    {
        $this->resourceToBeUpdated = null;
    }

    public function showDeleteResourceModal(): void
    {
        $this->deleteResourceModalVisible = true;
    }

    public function closeDeleteResourceModal(): void
    {
        $this->deleteResourceModalVisible = false;
    }

    public function star()
    {
        if ($this->hasStared) {
            $this->catalog->removeStar(auth()->user());
            $this->starsCount--;
            $this->hasStared = false;
        } else {
            $this->catalog->star(auth()->user());
            $this->starsCount++;
            $this->hasStared = true;
        }
    }
}
