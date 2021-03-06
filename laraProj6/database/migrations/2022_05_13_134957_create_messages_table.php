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
            $table->string('testo', 1000);
            $table->boolean('visualizzato')->default(false);
            $table->bigInteger('id_mitt')->unsigned();//->index();
            //$table->foreign('id_mitt')->references('id')->on('users');
            $table->bigInteger('id_dest')->unsigned();//->index();
            //$table->foreign('id_dest')->references('id')->on('users');
            $table->bigInteger('id_alloggio')->unsigned();//->index();
            //$table->foreign('id_alloggio')->references('id')->on('accomodations');
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
        Schema::dropIfExists('messages');
    }
}
