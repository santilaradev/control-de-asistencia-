<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabla de Conductores
        Schema::create('conductores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->timestamps();
        });

        // Tabla de Vehículos
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('marca');
            $table->timestamps();
        });

        // Tabla de Muelles
        Schema::create('muelles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Tabla de Rutas
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Tabla de Matrículas
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->timestamps();
        });

        // Tabla de Colores
        Schema::create('colores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Eliminar las tablas si se realiza un rollback
        Schema::dropIfExists('conductores');
        Schema::dropIfExists('vehiculos');
        Schema::dropIfExists('muelles');
        Schema::dropIfExists('rutas');
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('colores');
    }
}