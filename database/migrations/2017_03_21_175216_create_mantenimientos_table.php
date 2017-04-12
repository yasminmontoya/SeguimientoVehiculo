<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fase_nombre');
            $table->enum('fase_estado', ['terminado', 'en curso', 'sin realizar'])->default("sin realizar");
            $table->integer('vehiculo_id');
            $table->foreign('fase_nombre')->references('nombre')->on('fases');
            $table->foreign('fase_estado')->references('estado')->on('fases');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
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
        Schema::dropIfExists('mantenimientos');
    }
}
