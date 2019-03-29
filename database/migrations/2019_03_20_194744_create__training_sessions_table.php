<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->date('start_at');
            $table->date('finish_at');
            $table->unsignedbigInteger('coach_id');
<<<<<<< HEAD
            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->unsignedbigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms');
=======
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');
            $table->unsignedbigInteger('gym_id');
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');
>>>>>>> dc9fbd868f0a080b76464e62cbfc067133fa6d33
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('_training_sessions');
    }
}
