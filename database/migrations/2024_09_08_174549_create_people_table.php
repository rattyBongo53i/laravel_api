<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('surname');
            $table->string('firstName');
            $table->string('preferredName');
            $table->string('officialName');
            $table->string('email')->nullable();
            $table->string('nameInCharacters')->nullable();
            $table->enum('gender', ['M', 'F', 'Unspecified','Other']);
            $table->string('username')->nullable();
            $table->string('passwordStrong')->nullable();
            $table->enum('status', ['Expected', 'Full', 'Left','Pending Approval' ]);
            $table->date('dob')->nullable();
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
        Schema::dropIfExists('people');
    }
}