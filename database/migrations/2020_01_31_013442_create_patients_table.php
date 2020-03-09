<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appt_id')->unsigned();
            $table->string('name');
            $table->date('date');
            $table->string('phone');
            $table->string('code');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            $table->index('appt_id');
            $table->foreign('appt_id')->references('id')->on('appts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
