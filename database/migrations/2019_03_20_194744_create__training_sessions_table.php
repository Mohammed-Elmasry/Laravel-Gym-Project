<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->date('start_at');
            $table->date('finish_at');
            $table->unsignedbigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');
            $table->unsignedbigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_training_sessions');
    }
}
