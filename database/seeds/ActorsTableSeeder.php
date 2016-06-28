<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ActorsTableSeeder extends Seeder
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
            App\Actors::create([
                'strName'       => $faker->name,
                'dtBirth'       => $faker->dateTimeThisCentury,
                'strImage'      => $faker->imageUrl(),
                'strBio'        => $faker->paragraph(),
                'dtmCreated'    => Carbon::now()->toDateTimeString(),
                'dtmUpdated'    => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
