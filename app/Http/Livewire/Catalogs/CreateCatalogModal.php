<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Enums\CatalogCategoryEnum;
use App\DataTransferObjects\CatalogData;
use App\DataTransferObjects\ResourceData;
use App\Actions\Catalog\CreateCatalogAction;
use App\Actions\Resource\CreateResourceAction;

class CreateCatalogModal extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $resourceTitle;

    public $resourceDescription;

    public $photo;

    public $catalogCategory;

    public function mount()
    {
        $this->catalogCategory = CatalogCategoryEnum::SOFTWARE->value;
    }

    public function render()
    {
        return view('livewire.catalogs.create-catalog-modal', [
            'catalogCategories' => CatalogCategoryEnum::cases()
        ]);
    }

    public function createCatalog()
    {
        $this->validate();

        $catalog = resolve(CreateCatalogAction::class)->create(new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user(),
            photo: $this->photo ? $this->photo->store('photos', 'public') : null,
            category: CatalogCategoryEnum::from($this->catalogCategory)
        ));

        $resource = resolve(CreateResourceAction::class)->create(new ResourceData(
            title: $this->resourceTitle,
            description: $this->resourceDescription,
            catalog: $catalog,
            author: auth()->user()
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
