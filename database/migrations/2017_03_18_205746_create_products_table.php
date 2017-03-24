<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bereidingsduur');
            $table->string('naam', 50);
            $table->decimal('prijs', 16, 2);
            $table->string('beschrijving', 250);
            $table->enum('status', ['verwijdert', 'zichtbaar', 'verschuilen']);
            $table->enum('bezonderheden', ['vega', 'scherp', 'zoet', 'zuur', 'noot', 'glutten', 'halal'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
