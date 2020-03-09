<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appointment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('active')->nullable();
            $table->string('dob');
            $table->string('email');
            $table->integer('age'); 
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
            $table->string('weigth');
            $table->string('height');
            $table->string('image')->nullable();
            $table->string('mimeType')->nullable();
            $table->string('originalName')->nullable();
            
            $table->timestamps();

            $table->index('appointment_id');
            $table->index('user_id');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
