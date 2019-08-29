<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hero_id')->unsigned();
            $table->text('images')->nullable();
            $table->timestamps();

        });
        Schema::table('heroes_photos', function ($table){
            $table->foreign('hero_id')->references('id')->on('superheroes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes_photos');
    }
}
