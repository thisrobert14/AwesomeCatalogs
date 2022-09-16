<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Resource\CreateResourceAction;
use App\DataTransferObjects\ResourceData;
use App\Models\Catalog;
use Livewire\Component;

class CreateCatalogResourceModal extends Component
{
    public Catalog $catalog;

    public $title;

    public $description;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.catalogs.create-catalog-resource-modal');
    }

    public function createCatalogResource()
    {
        $resource = resolve(CreateResourceAction::class)->create(new ResourceData(
            title: $this->title,
            description: $this->description,
            catalog: $this->catalog,
            author: auth()->user(),
        ));

        $this->emit('resourceCreated');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,255'],
            'description' => ['required', 'string', 'between:2,255'],
        ];
    }
}
