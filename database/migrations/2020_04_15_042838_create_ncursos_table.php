<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcursosTable extends Migration
{
    public function up()
    {
        Schema::create('ncursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso')->unique();
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('programa_id');
            $table->timestamps();

            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ncursos');
    }
}
