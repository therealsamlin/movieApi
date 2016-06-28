<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Movies extends Model
{
    public $timestamps  = false;
    //

    protected $columnMapping = [
        'strName'   => 'name',
        'dcRating'    => 'rating',
        'strDescription'   => 'description',
        'strImage'  => 'image',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {

        return $this->belongsToMany('App\Genres', 'movie_genres', 'fk_Movie', 'fk_Genre');

    }

    public function actors()
    {

        return $this->belongsToMany('App\Actors', 'movie_actors', 'fk_Movie', 'fk_Actor')->withPivot('strCharacter');

    }

    public function addMovie($request)
    {

        $movie = new Movies();

        foreach ($this->columnMapping as $k => $v) {

            $movie->$k = $request->$v;

        }

        $movie->dtmCreated = Carbon::now()->toDateTimeString();
        $movie->dtmUpdated = Carbon::now()->toDateTimeString();
        $movie->save();

        return $movie;

    }
}
