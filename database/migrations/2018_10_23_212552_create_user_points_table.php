<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_rut')->index(); //Crea Usuario Index
            $table->foreign('user_rut')->references('rut')->on('users')->onDelete('cascade'); //Referencia al mail de users table
            $table->string('cod'); //Codigo Tecnico
            $table->string('day'); //Dia
            $table->string('month'); //Mes
            $table->string('year'); //Año
            $table->integer('productive_day')->nullable(); //Cantidad de produccion en el dia
            $table->string('special_productive')->nullable(); //Otro tipo de produccion
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
        Schema::dropIfExists('user_points');
    }
}
