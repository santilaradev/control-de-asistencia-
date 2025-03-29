<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    // Permite evitar el uso de $fillable en los modelos hijos
    protected $guarded = [];

    // Convierte automáticamente fechas en instancias de Carbon
    protected $dates = ['created_at', 'updated_at'];
}