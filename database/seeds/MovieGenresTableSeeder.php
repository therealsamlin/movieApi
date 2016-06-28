<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MovieGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (range(1,50) as $r) {
            App\MovieGenres::create([
                'fk_Genre'          =>  App\Genres::orderByRaw("RAND()")->get()->first()->id,
                'fk_Movie'          =>  App\Movies::orderByRaw("RAND()")->get()->first()->id,
                'dtmCreated'        => Carbon::now()->toDateTimeString(),
                'dtmUpdated'        => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
