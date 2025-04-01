<?php

use App\Http\Controllers\AsistenciaController; // Corregido el nombre
use App\Models\Asistencia;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
// Ruta principal 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Asegúrate de que exista la vista "dashboard.blade.php"
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Crear
Route::get('/asistencia/crear', [AsistenciaController::class, 'crear'])->name('asistencia.crear');
Route::post('/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');

// Leer
Route::get('/asistencia/leer', [AsistenciaController::class, 'leer'])->name('asistencia.leer');
Route::post('/asistencia/guardar', [AsistenciaController::class, 'guardar'])->name('asistencia.guardar');

// Editar
Route::get('/asistencia/editar/{id}', [AsistenciaController::class, 'editar'])->name('asistencia.editar');
Route::put('/asistencia/{id}', [AsistenciaController::class, 'update'])->name('asistencia.update');

// Eliminar
Route::get('/asistencia/eliminar', [AsistenciaController::class, 'eliminar'])->name('asistencia.eliminar');
Route::delete('/asistencia/{id}', [AsistenciaController::class, 'destroy'])->name('asistencia.destroy');

// Ruta para guardar asistencia con Carbon
Route::post('/asistencia/storeWithCarbon', [AsistenciaController::class, 'storeWithCarbon'])->name('storeWithCarbon');

//rutas de usuario
Route::get('/user', [UserController::class, 'getUserInfo']);
Route::get('/user/error', [UserController::class, 'errorExample']);


// Prueba de creación de asistencia con Carbon
Route::get('asistencia', function () {
//     $asistencia = Asistencia::create([
//         'fecha' => Carbon::now()->toDateString(),
//         'hora_salida' => Carbon::now()->toTimeString(),
//         'placa_del_vehiculo' => 'SDF123',
//         'vehiculo' => 'camion',
//         'nombre_conductor' => 'leandrys de la hoz',
//         'precinto_salida' => '345768',
//         'color' => 'azul',
//         'ruta' => '4',
//         'muelle' => 'C',
//         'ACP' => '331231',
//         'temperatura' => '5.0',
//         'fecha_retorno' => Carbon::now()->addDays(5)->toDateString(),
//         'hora_retorno' => Carbon::now()->addDays(5)->setHour(2)->toTimeString(),
//         'operacion_nacional' => 'transporte de alimentos',
//         'procedencia' => 'Barranquilla',
//         'observaciones' => 'llega 2 minutos tarde'
//     ]);

//     return response()->json([
//         'message' => 'Asistencia registrada exitosamente',
//         'data' => $asistencia
//     ]);

    //ACTUALIZAR
    // $asistencia = Asistencia::find(6);
    // $asistencia->color = 'Amarillo';
    // $asistencia->save();

    //Eliminar 
    // $asistencia = Asistencia::find(6);
    // $asistencia->delete();

    // return  "eliminar";

});

