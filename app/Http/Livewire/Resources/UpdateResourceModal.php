<?php

namespace App\Http\Livewire\Resources;

use App\Actions\Resource\UpdateResourceAction;
use App\DataTransferObjects\ResourceData;
use App\Models\Catalog;
use App\Models\Resource;
use Livewire\Component;

class UpdateResourceModal extends Component
{
    public Catalog $catalog;

    public Resource $resource;

    public $title = '';

    public $description = '';

    public function mount(Catalog $catalog, Resource $resource)
    {
        $this->catalog = $catalog;
        $this->resource = $resource;
        $this->title = $resource->title;
        $this->description = $resource->description;
    }

    public function render()
    {
        return view('livewire.resources.update-resource-modal');
    }

    public function updateResource()
    {
        $this->validate();

        resolve(UpdateResourceAction::class)->update($this->resource, new ResourceData(
            title: $this->title,
            description: $this->description,
            catalog: $this->catalog,
            author: auth()->user()
        ));

        $this->emit('resourceUpdated');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,255'],
            'description' => ['required', 'string', 'between:2,255'],
        ];
    }
}
