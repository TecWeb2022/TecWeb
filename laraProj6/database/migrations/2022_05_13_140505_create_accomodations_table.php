<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('descr');
            $table->string('tipologia', 2);
            $table->string('citta');
            $table->string('prov');
            $table->string('via');
            $table->integer('num_civ')->unsigned();
            $table->bigInteger('sup');
            $table->date('inizio_disp');
            $table->date('fine_disp');
            $table->smallInteger('eta_min')->nullable();
            $table->smallInteger('eta_max')->nullable();
            $table->string('sesso', 1)->nullable();
            $table->double('canone');
            $table->tinyInteger('posti_letto_tot')->nullable();
            $table->tinyInteger('letti_camera')->nullable();
            $table->boolean('cucina')->default(false);
            $table->smallInteger('num_bagni')->nullable();
            $table->smallInteger('num_camere')->nullable();
            $table->boolean('locale_ricreativo')->default(false);
            $table->boolean('angolo_studio')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('garage')->default(false);
            $table->boolean('climatizzatore')->default(false);
            $table->string('path_foto')->nullable();
            
            $table->string('proprietario');//->index();
            //$table->foreign('proprietario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
