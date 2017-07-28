<?php

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
            $table->string('amount')->length('50')->nullable();
            $table->tinyInteger('is_wow')->length('1')->nullable();
            $table->string('mobile')->length('50')->nullable();
            $table->string('user_id')->length('255')->nullable();
            $table->string('driver')->length('50')->nullable();
            $table->tinyInteger('status')->length('1')->nullable();
            $table->string('uid')->length('50')->nullable();
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
        Schema::drop('orders');
    }
}
