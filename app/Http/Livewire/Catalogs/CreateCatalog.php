<?php

namespace App\Http\Livewire\Catalogs;

use Livewire\Component;
use App\DataTransferObjects\CatalogData;
use App\Actions\Catalog\CreateCatalogAction;

class CreateCatalog extends Component
{
    public $title;

    public $description;

    public function render()
    {
        return view('livewire.catalogs.create-catalog');
    }

    public function createCatalog()
    {
        $catalog = resolve(CreateCatalogAction::class)->create(new CatalogData(
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
