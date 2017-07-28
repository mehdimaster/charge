<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile')->length('50')->nullable();
            $table->string('user_id')->length('50')->nullable();
            $table->string('email')->length('255')->nullable();
            $table->string('amount')->length('50')->nullable();
            $table->string('status')->length('255')->nullable();
            $table->string('uid')->length('255')->nullable();
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
        Schema::drop('payments');
    }
}
