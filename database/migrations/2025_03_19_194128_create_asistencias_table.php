<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora_salida');
            $table->string('matricula');
            $table->string('vehiculo');
            $table->string('nombre_conductor');
            $table->string('precinto_salida');
            $table->string('color');
            $table->string('ruta');
            $table->string('ACP');
            $table->string('temperatura');
            $table->date('fecha_retorno');
            $table->time('hora_retorno');
            $table->string('operación_nacional');
            $table->string('procedencia');
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
