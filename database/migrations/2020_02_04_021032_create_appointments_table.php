<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hour_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->date('date');
            $table->string('phone');
            $table->timestamps();

            $table->index('hour_id');
            $table->foreign('hour_id')->references('id')->on('hours')->onDelete('cascade');
            $table->index('user_id');
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
        Schema::dropIfExists('appointments');
    }
}
