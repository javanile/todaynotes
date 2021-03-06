<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Notes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'day',
        'team_id',
        'content',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'title', 'label'
    ];

    public function getTitleAttribute()
    {
        return 'title';
    }

    public function getLabelAttribute()
    {
        return $this->day;
    }

    public static function getCurrent()
    {
        $day = date('Y-m-d');
        $teamId = Auth::user()->currentTeam->id;
        $notes = self::where('day', '=', $day)
            ->where('team_id', '=', $teamId)
            ->first();
        if (empty($notes)) {
            $notes = Notes::create([
                'day' => $day,
                'team_id' => $teamId,
                'content' => '',
            ]);
        }
        return $notes;
    }

    public static function setCurrent($content)
    {
        $day = date('Y-m-d');
        $teamId = Auth::user()->currentTeam->id;
        $notes = Notes::where('day', '=', $day)
        ->where('team_id', '=', $teamId)
        ->first();
        if (empty($notes)) {
            $notes = Notes::create([
            'day' => $day,
            'team_id' => $teamId,
            'content' => $content,
            ]);
        }

        return $notes;
    }

    public static function updateContent($nid, $content)
    {
        Notes::where('id', $nid)->update([
            'content' => $content
        ]);
    }

    public static function loadList()
    {
        $teamId = Auth::user()->currentTeam->id;
        $notesList = self::where('team_id', '=', $teamId)->orderBy('day', 'desc')->get();

        if ($notesList->isEmpty()) {
            $notes = new Notes();
            $notesList->push($notes);
        }

        return $notesList;
    }
}
