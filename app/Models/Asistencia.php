<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencia';
    protected $fillable = [
        'fecha',
        'hora_salida',
        'matricula',
        'vehiculo',
        'placa_del_vehiculo',
        'nombre_conductor',
        'precinto_salida',
        'color',
        'ruta',
        'muelle',
        'ACP',
        'temperatura',
        'fecha_retorno',
        'hora_retorno',
        'operacion_nacional',
        'procedencia',
        'observaciones',
     ];
     protected $casts = [
        'fecha' => 'datetime',
        'hora_salida' => 'datetime',
        'fecha_retorno' => 'datetime',
        'hora_retorno' => 'datetime'
     ];
}    