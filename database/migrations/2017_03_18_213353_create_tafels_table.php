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
            $table->integer('aantal_plaatsen');
            $table->enum('status', ['verwijdert', 'zichtbaar', 'verschuilen']);
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
