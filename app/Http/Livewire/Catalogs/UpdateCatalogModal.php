<?php

namespace App\Http\Livewire\Catalogs;

use App\DataTransferObjects\CatalogData;
use App\Models\Catalog;
use Livewire\Component;

class UpdateCatalogModal extends Component
{
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
        return view('livewire.catalogs.update-catalog-modal');
    }

    public function update()
    {
        $this->validate();

        $catalog = resolve(UpdateCatalogModal::class)->update($this->catalog, new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user,
        ));

        $this->emit('closeUpdateCatalogModal');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:1,255'],
            'description' => ['required', 'string', 'between:1,255'],
        ];
    }
}
