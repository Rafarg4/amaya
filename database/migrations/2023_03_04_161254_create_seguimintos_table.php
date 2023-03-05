<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimintosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimintos', function (Blueprint $table) {
            $table->id('id');
            $table->text('descripcion');
            $table->text('fecha');
            $table->unsignedBigInteger('id_expediente');
            $table->foreign('id_expediente')->references('id')->on('expedientes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguimintos');
    }
}
