<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $tables = [
        'movies',
        'actors',
        'genres',
        'movie_actors',
        'movie_genres',
        'actor_genres',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();


        $this->call(MoviesTableSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(MovieActorsTableSeeder::class);
        // rerun if encountered integrity constraint, as I've set unique key for (fk_Genre,fk_Movie)
        $this->call(MovieGenresTableSeeder::class);
        $this->call(ActorGenresTableSeeder::class);
    }

    public function cleanDatabase()
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        // delete tables
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
