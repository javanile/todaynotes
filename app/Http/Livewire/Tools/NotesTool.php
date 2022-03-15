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
        $this->loadNotes();
    }

    public function render()
    {
        return view('livewire.tools.notes-tool');
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
            $day = date('Y-m-d');
            $teamId = Auth::user()->currentTeam->id;
            $notes = Notes::where('day', '=', $day)
                ->where('team_id', '=', $teamId)
                ->first();
            if (empty($notes)) {
                $notes = Notes::create([
                    'day' => $day,
                    'team_id' => $teamId,
                    'content' => $args['content'],
                ]);
            }
        }


        //$this->total = 2;
        //$this->tagline = json_encode($args);
        $this->loadNotes();
    }
}
