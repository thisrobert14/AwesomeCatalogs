<?php

namespace App\Http\Livewire\Catalogs;

use Livewire\Component;

class IndividualCatalogs extends Component
{
    public function render()
    {
        return view('livewire.catalogs.individual-catalogs', [
            'catalogs' => auth()->user()->catalogs->sortByDesc('created_at')
        ]);
    }
}
