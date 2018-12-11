<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyectosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            $table->foreign('id_usuario')->references('id')->on('users');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_usuarios');
    }
}
