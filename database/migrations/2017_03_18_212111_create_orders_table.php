<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tafel_id')->nullable()->unsigned();
            $table->foreign('tafel_id')->references('id')->on('tafel');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('location');
            $table->decimal('prijs', 6, 2)->default(0.00);
            $table->mediumInteger('korting')->default(0);
            $table->string('mollie_id', 20)->nullable();
            $table->enum('status', ['open','cancelled','pending','failed','paid'])->default('open');
            $table->enum('payment_method', ['pin', 'ideal', 'contant', 'paypal', 'bitcoin'])->nullable();
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
        Schema::dropIfExists('orders');
    }
}
