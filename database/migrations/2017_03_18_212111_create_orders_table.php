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
            $table->integer('tafel_id')->unsigned();
            $table->foreign('tafel_id')->references('id')->on('tafel');
            $table->string('mollie_id', 20)->nullable();
            $table->enum('status', ['open','cancelled','pending','failed','paid'])->default('open');
            $table->enum('payment_method', ['ideal', 'contant', 'paypal', 'bitcoin'])->nullable();
            $table->decimal('korting', 16, 2)->default(0);
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
