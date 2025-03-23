<?php

use App\Http\Controllers\AsistenciaController; // Corregido el nombre
use App\Http\Controllers\CarbonController;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Importar Carbon

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web de tu aplicación. Estas 
| rutas son cargadas por el RouteServiceProvider y todas estarán bajo 
| el middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Crear
Route::get('/asistencia/crear', [AsistenciaController::class, 'crear'])->name('asistencia.crear');
Route::post('/asistencia/store', [AsistenciaController::class, 'store'])->name('asistencia.store');

// Leer
Route::get('/asistencia/leer', [AsistenciaController::class, 'leer'])->name('asistencia.leer');
Route::post('/asistencia/guardar', [AsistenciaController::class, 'guardar'])->name('asistencia.guardar');

// Editar
Route::get('/asistencia/editar/{id}', [AsistenciaController::class, 'editar'])->name('asistencia.editar');
Route::put('/asistencia/{id}', [AsistenciaController::class, 'update'])->name('asistencia.update');

// Eliminar
Route::get('/asistencia/eliminar', [AsistenciaController::class, 'eliminar'])->name('asistencia.eliminar');
Route::delete('/asistencia/destroy', [AsistenciaController::class, 'destroy'])->name('asistencia.destroy');

// Ruta para guardar asistencia con Carbon
Route::post('/asistencia/storeWithCarbon', [AsistenciaController::class, 'storeWithCarbon'])->name('storeWithCarbon');
Route::get('/fecha', [CarbonController::class, 'fecha']);

// Prueba de creación de asistencia con Carbon
Route::get('asistencia', function () {
    $asistencia = Asistencia::create([
        'fecha' => Carbon::now()->toDateString(),
        'hora_salida' => Carbon::now()->toTimeString(),
        'placa_del_vehiculo' => 'ASD344',
        'vehiculo' => 'camion',
        'nombre_conductor' => 'diego payares',
        'precinto_salida' => '234435',
        'color' => 'azul',
        'ruta' => 'Ruta 3',
        'muelle' => 'Muelle A',
        'ACP' => '129324325',
        'temperatura' => '10.0',
        'fecha_retorno' => Carbon::now()->addDays(23)->toDateString(),
        'hora_retorno' => Carbon::now()->addDays(3)->setHour(7)->toTimeString(),
        'operacion_nacional' => 'transporte de alimentos',
        'procedencia' => 'Bogotá',
        'observaciones' => 'Falta el extintor'
    ]);

    return response()->json([
        'message' => 'Asistencia registrada exitosamente',
        'data' => $asistencia
    ]);

    //ACTUALIZAR
    // $asistencia = Asistencia::find(6);
    // $asistencia->color = 'Amarillo';
    // $asistencia->save();

    //Eliminar 
    // $asistencia = Asistencia::find(6);
    // $asistencia->delete();

    // return  "eliminar";

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
