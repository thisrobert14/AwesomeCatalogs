<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;

class ListCatalogs extends Component
{

    public bool $createCatalogModalVisible = false;

    protected $listeners = [
        'catalogCreated' => 'catalogCreated',
        'closeCreateCatalogModal' => 'closeCreateCatalogModal',
    ];

    public function render()
    {
        return view('livewire.catalogs.list-catalogs', [
            'catalogs' => Catalog::all()->sortByDesc('created_at')
        ]);
    }

    public function showCreateCatalogModal(): void
    {
        $this->createCatalogModalVisible = true;
    }

    public function closeCreateCatalogModal(): void
    {
        $this->createCatalogModalVisible = false;
    }

    public function catalogCreated(): void
    {
        $this->createCatalogModalVisible = false;   
    }
}
