<?php

namespace App\Http\Livewire\Resources;

use App\Actions\Resource\DeleteResourceAction;
use App\Models\Resource;
use Livewire\Component;

class DeleteResourceModal extends Component
{
    public Resource $resource;

    public bool $removeResourceModalVisible = false;

    public function mounte(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function render()
    {
        return view('livewire.resources.delete-resource-modal');
    }

    public function deleteResource()
    {
        resolve(DeleteResourceAction::class)->delete($this->resource);
        $this->emit('closeDeleteResourceModal');
    }

    public function showRemoveResourceModal(): void
    {
        $this->removeResourceModalVisible = true;
    }

    public function closeRemoveResourceModal(): void
    {
        $this->removeResourceModalVisible = false;
    }
}
