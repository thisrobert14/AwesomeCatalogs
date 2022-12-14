<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use App\Models\Resource;

class ListCatalog extends Component
{
    public bool $createCatalogResourceModalVisible = false;

    public bool $updateCatalogModalVisible = false;

    public bool $deleteCatalogModalVisible = false;

    public ?Resource $resourceToBeUpdated = null;

    public ?Resource $resourceToBeRemoved = null;

    public bool $createCatalogCommentModalVisible = false;

    protected $listeners = [
        'catalogResourceCreated' => 'catalogResourceCreated',
        'closeCreateCatalogResourceModal' => 'closeCreateCatalogResourceModal',
        'closeUpdateCatalogModal' => 'closeUpdateCatalogModal',
        'closeDeleteCatalogModal' => 'closeDeleteCatalogModal',
        'closeUpdateResourceModal' => 'closeUpdateResourceModal',
        'closeDeleteResourceModal' => 'closeDeleteResourceModal',
        'closeCreateCatalogCommentModal' => 'closeCreateCatalogCommentModal',
        'commentCreated' => 'commentCreated',
        'catalogUpdated' => 'catalogUpdated',
        'resourceUpdated' => 'resourceUpdated',
        'resourceDeleted' => 'resourceDeleted',
        'catalogDeleted' => 'catalogDeleted',
        'resourceCreated' => 'resourceCreated',
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

    public function showDeleteResourceModal(string $resourceId): void
    {
        $this->resourceToBeRemoved = Resource::find($resourceId);
    }

    public function closeDeleteResourceModal(): void
    {
        $this->resourceToBeRemoved = null;
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

    public function showCreateCatalogCommentModal(): void
    {
        $this->createCatalogCommentModalVisible = true;
    }

    public function closeCreateCatalogCommentModal(): void
    {
        $this->createCatalogCommentModalVisible = false;
    }

    public function commentCreated(): void
    {
        $this->closeCreateCatalogCommentModal();   
        $this->notifySuccess('Comment has been posted!');
    } 

    public function catalogUpdated(): void
    {
        $this->closeUpdateCatalogModal();
        $this->notifySuccess('Catalog Updated!');
    }

    public function resourceUpdated(): void
    {
        $this->closeUpdateResourceModal();
        $this->notifySuccess('Resource updated!');
    }

    public function resourceDeleted(): void
    {
        $this->closeDeleteResourceModal();
        $this->notifySuccess('Resource deleted!');
    }

    public function catalogDeleted(): void
    {
        $this->closeDeleteCatalogModal();
        $this->notifySuccess('Catalog deleted!');
    }

    public function resourceCreated(): void
    {
        $this->closeCreateCatalogResourceModal();
        $this->notifySuccess('Resource created!');
    }

}
