<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use Livewire\Component;
use App\Enums\CatalogCategoryEnum;

class ListCatalogs extends Component
{
    public $category;

    public bool $createCatalogModalVisible = false;

    protected $listeners = [
        'catalogCreated' => 'catalogCreated',
        'closeCreateCatalogModal' => 'closeCreateCatalogModal',
    ];

    public function render()
    {
        $categories = CatalogCategoryEnum::cases();

        return view('livewire.catalogs.list-catalogs', [
            'catalogs' => Catalog::all()->sortByDesc('created_at')
                ->when($this->category && $this->category != 'All categories', function ($query) use 
                    ($categories)  {
                        return $query->where('category', CatalogCategoryEnum::from($this->category));
                    }),
            'categories' => $categories
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
        $this->closeCreateCatalogModal();   
        $this->notifySuccess('Catalog created!');
    }
}