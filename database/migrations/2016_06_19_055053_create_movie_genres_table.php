<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_Genre')->unsigned()->index();
            $table->integer('fk_Movie')->unsigned()->index();
            $table->datetime('dtmCreated');
            $table->datetime('dtmUpdated');


            // keys
            $table->foreign('fk_Genre')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('fk_Movie')->references('id')->on('movies')->onDelete('cascade');
            $table->unique(['fk_Genre', 'fk_Movie']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
