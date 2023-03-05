<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id('id');
            $table->text('numero');
            $table->text('anho');
            $table->text('caratula');
            $table->text('estado');
            $table->unsignedBigInteger('id_juzgado');
            $table->unsignedBigInteger('id_circunscripcion');
            $table->unsignedBigInteger('id_fuero');
            $table->timestamps();
            $table->softDeletes();
           $table->foreign('id_juzgado')->references('id')->on('juzgados');
            $table->foreign('id_circunscripcion')->references('id')->on('circunscripcions');
            $table->foreign('id_fuero')->references('id')->on('fueros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expedientes');
    }
}
