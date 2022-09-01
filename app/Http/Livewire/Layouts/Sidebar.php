<?php

namespace App\Http\Livewire\Layouts;

use Route;
use Livewire\Component;

class Sidebar extends Component
{
    public string $currentRouteName = '';

    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.layouts.sidebar');
    }
}
