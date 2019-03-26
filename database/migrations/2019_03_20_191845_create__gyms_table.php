<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
<<<<<<< HEAD
            $table->date('create_at');
            $table->string('cover_image');
            $table->integer('revenue');
            $table->unsignedbigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
=======
            $table->date('created_at');
            $table->string('cover_image');
            $table->integer('revenue');
            $table->unsignedbigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('_gyms');
    }
}
