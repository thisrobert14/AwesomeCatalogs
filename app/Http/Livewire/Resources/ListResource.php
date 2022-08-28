<?php

namespace App\Http\Livewire\Resources;

use App\Models\Resource;
use Livewire\Component;
use Symfony\Component\VarDumper\Caster\ResourceCaster;

class ListResource extends Component
{
    public Resource $resource;

    public $title;

    public function mount(Resource $resource)
    {
        $this->resource = $resource;
        $this->title = $resource->title;
    }

    public function render()
    {
        return view('livewire.resources.list-resource');
    }
}
