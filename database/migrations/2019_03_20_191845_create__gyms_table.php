<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
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
            $table->string('cover_image')->nullable();
            $table->integer('revenue')->default(0);
            $table->unsignedbigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
>>>>>>> dc9fbd868f0a080b76464e62cbfc067133fa6d33
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('_gyms');
    }
}
