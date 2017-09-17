<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseDeDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_docente');
            $table->string('descripcion');
            
           
            $table->timestamps();
        });
        Schema::create('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_formulario');
            $table->string('descripcion');
            $table->timestamps();
        });
        

        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_seccion');
            $table->string('numeracion');
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pregunta');
            $table->integer('id_docente');
            $table->string('respuesta');
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
        //

    }
}
