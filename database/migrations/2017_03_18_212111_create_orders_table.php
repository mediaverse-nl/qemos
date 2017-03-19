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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tafel_id')->unsigned();
            $table->foreign('tafel_id')->references('id')->on('tafel');
            $table->string('mollie_id', 20)->nullable();
            $table->enum('status', ['open','cancelled','pending','failed','paid']);
            $table->enum('payment_method', ['ideal', 'contant', 'paypal', 'bitcoin']);
            $table->decimal('korting', 16, 2);
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
