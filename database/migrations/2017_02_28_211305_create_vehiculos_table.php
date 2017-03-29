<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('placa',6)->unique();
            $table->string('marca',100);
            $table->string('linea',100);
            $table->integer('modelo')->unsigned();
            $table->integer('fase_id')->nullable();
            $table->integer('servicio_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fase_id')->references('id')->on('fases');
            $table->foreign('servicio_id')->references('id')->on('servicios');
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
        Schema::dropIfExists('vehiculos');
    }
}
