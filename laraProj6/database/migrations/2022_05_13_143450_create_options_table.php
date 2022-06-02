<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('data_stipula')->nullable();
            $table->bigInteger('id_alloggio')->unsigned();//->index();
            //$table->foreign('id_alloggio')->references('id')->on('accomodations');
            $table->bigInteger('id_locatario')->unsigned();//->index();
            //$table->foreign('id_locatario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
