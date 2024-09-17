<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoyalStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('royal_students', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('firstName')->nullable();
            $table->string('officialName');
            $table->enum('gender', ['M', 'F', 'Other', 'Unspecified']);
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('address1')->nullable();
            $table->string('address1District')->nullable();
            $table->string('address1Country')->nullable();
            $table->string('languageFirst')->nullable();
            $table->string('languageSecond')->nullable();
            $table->string('studentID')->nullable();
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
        Schema::dropIfExists('royal_students');
    }
}