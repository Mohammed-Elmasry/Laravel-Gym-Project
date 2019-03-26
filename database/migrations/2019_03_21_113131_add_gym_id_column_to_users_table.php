<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGymIdColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedbigInteger('gym_id')->nullable();
<<<<<<< HEAD
            $table->foreign('gym_id')->references('id')->on('gyms');
=======
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade');
>>>>>>> e08178c4ba148df79a043e80263c8637b7af7e14
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
