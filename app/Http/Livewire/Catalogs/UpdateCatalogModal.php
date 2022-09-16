<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\DataTransferObjects\CatalogData;
use App\Actions\Catalog\UpdateCatalogAction;

class UpdateCatalogModal extends Component
{
    use WithFileUploads;

    public Catalog $catalog;

    public string $title = '';

    public string $description = '';

    public $photo;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
        $this->title = $catalog->title;
        $this->description = $catalog->description;
    }

    public function render()
    {
        return view('livewire.catalogs.update-catalog-modal');
    }


    public function updateCatalog()
    {
        $this->validate();

        $imageToShow = $this->catalog->photo ?? null;

        resolve(UpdateCatalogAction::class)->update($this->catalog, new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user(),
            photo: $this->photo ? $this->photo->store('photos', 'public') : $imageToShow
        ));

        $this->emit('catalogUpdated');

    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,255'],
            'description' => ['required', 'string', 'between:2,255'],
        ];
    }
}
