<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.g
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slip_id');
            $table->unsignedBigInteger('match_id');
            $table->string('bet_type');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
            $table->string('league');
            $table->string('prediction');
            $table->boolean('result')->default(false);
            $table->decimal('odd', 5, 2)->default(0.00);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->foreignId('slid_id')->constrained('slips');
            // $table->foreign('slip_id')->references('id')->on('slips')->onDelete('cascade');
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
        Schema::dropIfExists('predictions');
    }
}
