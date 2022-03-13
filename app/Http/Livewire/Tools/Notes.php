<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class Notes extends Component
{
    public $name = "Ciao";

    public $notes;

    public function mount()
    {
        $this->notes = [
            (object)[
                'title' => 'Caio'
            ],
            (object)[
                'title' => 'Caio'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.tools.notes');
    }
}
