<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('Employer');
            $table->string('name');
            $table->string('email');
            $table->string('job_title');
            $table->string('job_description');
            $table->string('department');
            $table->boolean('email_verified');
            $table->string('password');
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('zip');
            $table->string('phone');
            $table->boolean('phone_verified');
            $table->boolean('verified');
            $table->string('national_id');
            $table->timestamp('hired_date');
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
        Schema::dropIfExists('Employee');
    }
}
