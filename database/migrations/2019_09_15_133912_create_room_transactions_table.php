<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('invoice_id')->unique();
            $table->integer('guest_id');
            $table->integer('room_id');
            $table->integer('adult');
            $table->integer('child');
            $table->dateTime('checkin_date');
            $table->dateTime('checkout_date');
            $table->string('price_total');
            $table->string('deposite')->nullable()->default(0);
            $table->string('method');
            $table->string('credit_no')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('room_transactions');
    }
}
