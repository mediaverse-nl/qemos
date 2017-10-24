<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTafelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tafels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->nullable()->unsigned();
            $table->foreign('location_id')->references('id')->on('location');
            $table->integer('aantal_plaatsen');
            $table->integer('tafel_nr');
            $table->boolean('bezet')->default(false);
            $table->enum('status', ['verwijdert', 'zichtbaar', 'verschuilen']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tafels');
    }
}
