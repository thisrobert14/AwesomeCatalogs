<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalogs extends Component
{
    public function render()
    {
        return view('livewire.catalogs.list-catalogs', [
            'catalogs' => Catalog::all()->sortByDesc('created_at')
        ]);
    }
}
