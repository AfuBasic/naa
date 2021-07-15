<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('membership_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->datetime('date_of_birth')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('office_number')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['inactive', 'pending', 'active'])->default('pending');
            $table->string('last_certificate_id')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->enum('type', ['new', 'existing'])->default('new');
            $table->string('naa_email')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
