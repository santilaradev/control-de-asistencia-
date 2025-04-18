<?php
namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Vehiculo;
use App\Models\Muelle;
use App\Models\Ruta;
use App\Models\Matricula;
use App\Models\Color;
use Illuminate\Http\Request;

class Asistenciacontroller extends Controller
{
    public function create()
    {
        // Obtener todos los registros para las listas desplegables
        $conductores = Conductor::all();
        $vehiculos = Vehiculo::all();
        $muelles = Muelle::all();
        $rutas = Ruta::all();
        $matriculas = Matricula::all();
        $colores = Color::all();

        return view('registro.create', compact('conductores', 'vehiculos', 'muelles', 'rutas', 'matriculas', 'colores'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'conductor_id' => 'required|exists:conductores,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'muelle_id' => 'required|exists:muelles,id',
            'ruta_id' => 'required|exists:rutas,id',
            'matricula_id' => 'required|exists:matriculas,id',
            'color_id' => 'required|exists:colores,id',
        ]);

        // Lógica para guardar los datos (asumiendo que tienes un modelo para la entidad de registros)
        // Registro::create($request->all());

        return redirect()->route('registro.index')->with('success', 'Registro guardado correctamente');
    }
}