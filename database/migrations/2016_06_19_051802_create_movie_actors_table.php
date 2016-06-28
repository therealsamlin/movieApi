<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_actors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_Movie')->unsigned()->index();
            $table->integer('fk_Actor')->unsigned()->index();
            $table->string('strCharacter');
            $table->datetime('dtmCreated');
            $table->datetime('dtmUpdated');

            // keys
            $table->foreign('fk_Movie')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('fk_Actor')->references('id')->on('actors')->onDelete('cascade');
            // same movie can have the same actor more than once but not the playing the same character.
            $table->unique(['fk_Movie', 'fk_Actor', 'strCharacter']);

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
