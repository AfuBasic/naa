<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('business_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('lot_id')->nullable();
            $table->string('item_name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('quantity');
            $table->integer('transaction_id');
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->text('images')->nullable();
            $table->enum('status', ['enabled', 'disabled'])->default('disabled');
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
