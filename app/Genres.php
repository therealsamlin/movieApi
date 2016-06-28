<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Genres extends Model
{

    protected $columnMapping = [
        'strName'   => 'name',
    ];

    //
    public $timestamps = false;

    public function addGenre($request)
    {

        $genre = new Genres();

        foreach ($this->columnMapping as $k => $v) {

            $genre->$k = $request->$v;

        }

        $genre->dtmCreated = Carbon::now()->toDateTimeString();
        $genre->dtmUpdated = Carbon::now()->toDateTimeString();
        $genre->save();

        return $genre;

    }
}
