<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('strName');
            $table->decimal('dcRating', 5, 2)->nullable();
            $table->text('strDescription')->nullable();
            $table->text('strImage')->nullable();
            $table->datetime('dtmCreated');
            $table->datetime('dtmUpdated');
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
