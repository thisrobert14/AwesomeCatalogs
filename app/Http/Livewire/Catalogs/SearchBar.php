<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use App\Enums\CatalogCategoryEnum;

class SearchBar extends Component
{    
    public $search = '';

    public $searchResults = [];

    public function updatedSearch()
    {
        $this->searchResults = Catalog::where('title', 'like', '%' . $this->search . '%')
            ->get()
            ->toArray();
    }


    public function render()
    {
        return view('livewire.catalogs.search-bar');
    }
}
