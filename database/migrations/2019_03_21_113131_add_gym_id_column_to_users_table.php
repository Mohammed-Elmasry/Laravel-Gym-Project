<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGymIdColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedbigInteger('gym_id')->nullable();
<<<<<<< HEAD
            $table->foreign('gym_id')->references('id')->on('gyms');
=======
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');
>>>>>>> dc9fbd868f0a080b76464e62cbfc067133fa6d33
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        });
    }
}
