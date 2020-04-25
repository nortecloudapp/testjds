<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiclosTable extends Migration
{
    public function up()
    {
        Schema::create('ciclos', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_ciclo')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciclos');
    }
}
