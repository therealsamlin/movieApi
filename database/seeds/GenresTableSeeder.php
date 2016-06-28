<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class GenresTableSeeder extends Seeder
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
            App\Genres::create([
                'strName'       => $faker->word(),
                'dtmCreated'    => Carbon::now()->toDateTimeString(),
                'dtmUpdated'    => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
