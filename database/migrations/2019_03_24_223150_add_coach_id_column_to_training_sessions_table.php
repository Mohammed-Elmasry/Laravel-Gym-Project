<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoachIdColumnToTrainingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->unsignedbigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('coaches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            //
        });
    }
}
