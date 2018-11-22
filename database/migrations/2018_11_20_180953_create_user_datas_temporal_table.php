<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatasTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas_temporal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_rut')->nullable();//Referencia al mail de users table
            $table->string('avatar')->default('default.png');
            $table->string('first_name'); //Primer Nombre
            $table->string('middle_name')->nullable(); //Segundo Nombre
            $table->string('last_pat_name'); //Apellido Paterno
            $table->string('last_mat_name'); //Apellido Materno
            //$table->integer('rut')->unique(); //Rut sin digito
            //$table->integer('dig'); //Digito
            $table->date('born'); //Fecha de nacimiento
            $table->string('region'); //Region
            $table->string('city'); //Ciudad
            $table->string('address'); //Direccion
            $table->string('civil_state'); //Estado Civil
            $table->string('lic'); //Licencia de conducir
            $table->date('lic_exp')->nullable(); //Fecha de vencimiento de licencia
            $table->string('particular_email'); //Email Particular
            $table->string('phone_fij')->nullable(); //Telefono Fijo
            $table->string('phone_movil'); //Telefono Movil
            $table->string('prev_sal'); //Prevision Salud
            $table->string('prev_pen'); //Prevision Pension
            $table->timestamps();
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_datas_temporal');
    }
}
