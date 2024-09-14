<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odds', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('match_id');
            $table->string('bet_type');
            $table->string('prediction')->nullable();
            $table->decimal('odd', 5, 2)->nullable();
            $table->foreignId('match_id')->constrained('match_games');
            // $table->foreign('match_id')->references('id')->on('match_games')->onDelete('cascade');
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
        Schema::dropIfExists('odds');
    }
}
