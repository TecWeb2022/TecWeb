<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('testo');
            $table->boolean('visualizzato');
            $table->dateTime('inviato');
            $table->string('id_mitt');//->index();
            //$table->foreign('id_mitt')->references('id')->on('users');
            $table->string('id_dest');//->index();
            //$table->foreign('id_dest')->references('id')->on('users');
            $table->bigInteger('id_alloggio')->unsigned();//->index();
            //$table->foreign('id_alloggio')->references('id')->on('accomodations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
