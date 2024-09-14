<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_employers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->boolean('email_verified')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('business_certificate')->nullable();
            $table->string('phone_1')->nullable();
            $table->boolean('phone_1_verified')->nullable();
            $table->string('phone_2')->nullable();
            $table->boolean('phone_2_verified')->nullable();
            $table->boolean('verified')->nullable();
            $table->string('employer_code')->nullable();
            $table->string('company');
            $table->string('password');
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
        Schema::dropIfExists('auth_employers');
    }
}
