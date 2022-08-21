<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use App\DataTransferObjects\CatalogData;
use App\Actions\Catalog\UpdateCatalogAction;

class UpdateCatalogModal extends Component
{
    public Catalog $catalog;

    public string $title = '';

    public string $description = '';

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

        resolve(UpdateCatalogAction::class)->update($this->catalog, new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user()
        ));

        $this->emit('closeUpdateCatalogModal');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,255'],
            'description' => ['required', 'string', 'between:2,255'],
        ];
    }
}
