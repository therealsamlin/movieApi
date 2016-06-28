<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MovieActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach (range(1,50) as $r) {
            App\MovieActors::create([
                'fk_Movie'          => App\Movies::orderByRaw("RAND()")->get()->first()->id,
                'fk_Actor'          => App\Actors::orderByRaw("RAND()")->get()->first()->id,
                'strCharacter'      => $faker->name(),
                'dtmCreated'        => Carbon::now()->toDateTimeString(),
                'dtmUpdated'        => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
