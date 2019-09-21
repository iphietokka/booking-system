<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

                        $table->integer('user_id');
            $table->integer('room_transaction_id');
            $table->integer('service_id');
            $table->integer('qty');
            $table->integer('total');
             $table->string('price');
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
        Schema::dropIfExists('service_transactions');
    }
}
