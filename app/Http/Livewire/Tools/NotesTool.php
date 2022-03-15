<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;
use Auth;
use App\Models\Notes;

class NotesTool extends Component
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
        $notes = Notes::getCurrent();
        $this->nid = $notes->id;
        $this->content = $notes->content;

        $this->loadNotesList();
    }

    public function render()
    {
        return view('livewire.tools.notes-tool');
    }

    public function increment()
    {
        $this->loadNotesList();
        $this->total = $this->total + 1;
    }

    public function loadNotesList()
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
            $notes = Notes::setCurrent($args['content']);
            $this->nid = $notes->id;
        } else {
            Notes::updateContent($args['nid'], $args['content']);
            $this->nid = $args['nid'];
        }

        //$this->total = 2;
        //$this->tagline = json_encode($args);
        $this->loadNotesList();
    }
}
