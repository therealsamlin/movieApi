<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Actors extends Model
{
    public $timestamps  = false;

    protected $columnMapping = [
        'strName'   => 'name',
        'strBio'    => 'bio',
        'dtBirth'   => 'birth_date',
        'strImage'  => 'image',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {

        return $this->belongsToMany('App\Genres', 'actor_genres', 'fk_Actor', 'fk_Genre');

    }

    /**
     * @return string
     */
    public function getAge()
    {

        $birthDate = \DateTime::createFromFormat('Y-m-d', $this->dtBirth);

        return Carbon::createFromDate($birthDate->format('Y'), $birthDate->format('m'), $birthDate->format('d'))
            ->diff(Carbon::now())
            ->format('%y');

    }

    /**
     * @param $request
     * @return Actors
     */
    public function addActor($request)
    {

        $actor = new Actors;

        foreach ($this->columnMapping as $k => $v) {

            $actor->$k = $request->$v;

        }

        $actor->dtmCreated = Carbon::now()->toDateTimeString();
        $actor->dtmUpdated = Carbon::now()->toDateTimeString();
        $actor->save();

        return $actor;

    }


}
