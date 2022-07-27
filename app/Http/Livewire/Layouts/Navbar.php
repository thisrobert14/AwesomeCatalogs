<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.layouts.navbar');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('authentication.login');
    }
}
