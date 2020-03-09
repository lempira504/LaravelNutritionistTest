<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cita_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('brazos');
            $table->string('espalda');
            $table->string('busto');
            $table->string('cintura');
            $table->string('cadera');
            $table->string('piernas');
            $table->string('peso_inicial');
            $table->string('grasa_corporal');
            $table->string('grasa_visceral');
            $table->string('indice_masa_corporal');
            $table->string('masa_muscular');
            $table->string('talla');
            $table->integer('edad');
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->string('path')->nullable();

            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('cita_id');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
