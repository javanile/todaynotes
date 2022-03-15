<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;

class Notes extends Component
{
    public $nid;

    public $name = "Ciao";

    public $total;

    public $notes;

    public $content;

    public $tagline;

    public $listeners = ['sync'];

    public function mount()
    {
        $this->loadNotes();
    }

    public function render()
    {
        return view('livewire.tools.notes');
    }

    public function increment()
    {
        $this->loadNotes();
        $this->total = $this->total + 1;
    }

    public function loadNotes()
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

    public function sync($args)
    {
        if (empty($args['nid'])) {

        }

        $this->total = 2;
        $this->tagline = json_encode($args);
        $this->loadNotes();
    }
}
