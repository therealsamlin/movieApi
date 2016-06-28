<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_Genre')->unsigned()->index();
            $table->integer('fk_Actor')->unsigned()->index();
            $table->datetime('dtmCreated');
            $table->datetime('dtmUpdated');


            // keys
            $table->foreign('fk_Genre')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('fk_Actor')->references('id')->on('actors')->onDelete('cascade');
            $table->unique(['fk_Genre', 'fk_Actor']);
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
