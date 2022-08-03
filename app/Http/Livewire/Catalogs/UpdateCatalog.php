<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use App\DataTransferObjects\CatalogData;
use App\Actions\Catalog\UpdateCatalogAction;

class UpdateCatalog extends Component
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
        return view('livewire.catalogs.update-catalog');
    }

    public function updateCatalog()
    {
        $this->validate();

        $this->catalog = resolve(UpdateCatalogAction::class)->update($this->catalog, new CatalogData(
            title: $this->title,
            description: $this->description,
            author: auth()->user(),
        ));
        return redirect()->route('show.catalogs');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:1,255'],
            'description' => ['required', 'string', 'between:1,255'],
        ];
    }
}
