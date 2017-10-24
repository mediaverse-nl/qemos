<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKioskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiosk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->nullable()->unsigned();
            $table->foreign('location_id')->references('id')->on('location');
            $table->string('api_key');
            $table->string('model_nr');
            $table->enum('status', \App\Kiosk::status());
            $table->timestamps();
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
        Schema::dropIfExists('kiosk');
    }
}
