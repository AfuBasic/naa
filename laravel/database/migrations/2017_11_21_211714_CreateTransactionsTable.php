<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('payment_reference');
            $table->string('payment_type');
            $table->decimal('amount');
            $table->datetime('transaction_date');
            $table->enum('status', ['pending', 'successful', 'failed'])->default('pending');
            $table->string('gateway_status')->nullable();
            $table->string('transaction_reference')->nullable();
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
        //
    }
}
