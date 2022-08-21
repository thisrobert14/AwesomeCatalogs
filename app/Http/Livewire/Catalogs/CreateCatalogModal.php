<?php

namespace App\Http\Livewire\Catalogs;

use Livewire\Component;
use App\DataTransferObjects\CatalogData;
use App\DataTransferObjects\ResourceData;
use App\Actions\Catalog\CreateCatalogAction;
use App\Actions\Resource\CreateResourceAction;

class CreateCatalogModal extends Component
{
    public $title;

    public $description;

    public $resourceTitle;

    public $resourceDescription;

    public function render()
    {
        return view('livewire.catalogs.create-catalog-modal');
    }

    public function createCatalog()
    {
        $this->validate();

        $catalog = resolve(CreateCatalogAction::class)->create(new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user()
        ));

        $resource = resolve(CreateResourceAction::class)->create(new ResourceData(
            title: $this->resourceTitle,
            description: $this->resourceDescription,
            catalog: $catalog
        ));

        $this->emit('catalogCreated');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,255'],
            'description' => ['required', 'string', 'between:2,255'],
        ];
    }
}
