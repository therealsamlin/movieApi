<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MoviesTableSeeder extends Seeder
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
            App\Movies::create([
                'strName'           => $faker->sentence(10),
                'dcRating'          => $faker->numberBetween(1,100),
                'strImage'          => $faker->imageUrl(),
                'strDescription'    => $faker->paragraph(),
                'dtmCreated'        => Carbon::now()->toDateTimeString(),
                'dtmUpdated'        => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
