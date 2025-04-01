<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use Carbon\Carbon;

class Asistenciacontroller extends Controller
{
   

    public function crear()
    {
        return view('asistencia.crear');
    }

    public function leer()
    {
        $asistencias = Asistencia::all();
        return view('asistencia.leer', compact('asistencias'));
    }

    public function eliminar()
    {
        $asistencia = Asistencia::all();
        return view('asistencia.eliminar', compact('asistencia'));
    }

    public function editar($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        return view('asistencia.editar', compact('asistencia'));
    }

    public function update(Request $request, $id)
    {
        $asistencia = Asistencia::findOrFail($id);

        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora_salida' => 'nullable|string',
            'placa_del_vehiculo' => 'required|string',
            'vehiculo' => 'required|string',
            'nombre_conductor' => 'required|string',
            'precinto_salida' => 'nullable|string',
            'color' => 'nullable|string',
            'ruta' => 'nullable|string',
            'muelle' => 'nullable|string',
            'ACP' => 'nullable|string',
            'temperatura' => 'nullable|numeric',
            'fecha_retorno' => 'nullable|date',
            'hora_retorno' => 'nullable|string',
            'operacion_nacional' => 'nullable|string',
            'procedencia' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        $asistencia->update($validatedData);

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_salida' => 'nullable|date_format:H:i',
            'placa_del_vehiculo' => 'required|string|max:20',
            'vehiculo' => 'required|string|max:20',
            'nombre_conductor' => 'required|string|max:100',
            'precinto_salida' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'ruta' => 'required|string|max:100',
            'muelle' => 'required|string|max:50',
            'ACP' => 'required|string|max:50',
            'temperatura' => 'nullable|numeric',
            'fecha_retorno' => 'nullable|date',
            'hora_retorno' => 'nullable|date_format:H:i',
            'operacion_nacional' => 'required|string|max:100',
            'procedencia' => 'required|string|max:100',
            'observaciones' => 'nullable|string',
        ]);

        Asistencia::create($request->all());

        return redirect()->back()->with('success', 'Asistencia registrada correctamente.');
    }

    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);
        if ($asistencia) {
            $asistencia->delete();
            return redirect()->back()->with('success', 'Asistencia borrada con éxito');
        } else {
            return redirect()->back()->with('error', 'Asistencia no encontrada');
        }
    }
    
}
