<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_detalle_traducciones', function (Blueprint $table) {
            $table->id();
            $table->text('acerca_de_mi');
            $table->text('pasatiempos');
            $table->string('idioma');

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');

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
        Schema::dropIfExists('empleados_detalle_traducciones');
    }
};
