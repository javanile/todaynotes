<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class Notes extends Component
{
    public $name = "Ciao";

    public function render()
    {
        return view('livewire.tools.notes');
    }
}
