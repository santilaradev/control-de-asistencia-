<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use Carbon\Carbon;

class Asistenciacontroller extends Controller
{

    public function storeWithCarbon(Request $request)
    {
        $asistencia = new Asistencia();
        $asistencia->fecha = Carbon::now()->toDateString();  
        $asistencia->hora_salida = Carbon::now()->toTimeString();
        $asistencia->placa_del_vehiculo = $request->placa_del_vehiculo;
        $asistencia->vehiculo = $request->vehiculo;
        $asistencia->nombre_conductor = $request->nombre_conductor;
        $asistencia->precinto_salida = $request->precinto_salida;
        $asistencia->color = $request->color;
        $asistencia->ruta = $request->ruta;
        $asistencia->muelle = $request->muelle;
        $asistencia->ACP = $request->ACP;
        $asistencia->temperatura = $request->temperatura;
        $asistencia->fecha_retorno = $request->fecha_retorno;
        $asistencia->hora_retorno = $request->hora_retorno;
        $asistencia->operacion_nacional = $request->operacion_nacional;
        $asistencia->procedencia = $request->procedencia;
        $asistencia->observaciones = $request->observaciones;

        $asistencia->save();

        return response()->json(['message' => 'Asistencia registrada correctamente']);
    }

    
   
     public function crear(){
        return view('asistencia.crear');
     }

     public function leer()
     {
      $asistencia = Asistencia::all();
      return view('asistencia.leer', compact('asistencia'));
     }

     public function eliminar()
     {
      $asistencia = Asistencia::all();
      return view('asistencia.eliminar', compact('asistencia'));
     }

     public function editar($id){
        $asistencia = Asistencia::findOrFail($id);
        return view('asistencia.editar', compact('asistencia'));
        
     }

     public function update(Request $request, $id)
     {

        $asistencia = Asistencia::findOrFail($id);
        

         // Validar los datos recibidos
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
     
         


         $asistencia->update($request->all());
     
         // Redirigir con mensaje de éxito
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
                'ACP' => 'required|strinwg|max:50',
                'temperatura' => 'nullable|numeric',
                'fecha_retorno' => 'nullable|date',
                'hora_retorno' => 'nullable|date_format:H:i',
                'operacion_nacional' => 'required|string|max:100',
                'procedencia' => 'required|string|max:100',
                'observaciones' => 'nullable|string',
        ]);

        $asistencia = new Asistencia();
        $asistencia->fecha = Carbon::now()->toDateString();
        $asistencia->hora_salida = Carbon::now()->toTimeString();
        $asistencia->placa_del_vehiculo = $request->placa_del_vehiculo;
        $asistencia->vehiculo = $request->vehiculo;
        $asistencia->nombre_conductor = $request->nombre_conductor;
        $asistencia->precinto_salida = $request->precinto_salida;
        $asistencia->color = $request->color;
        $asistencia->ruta = $request->ruta;
        $asistencia->muelle = $request->muelle;
        $asistencia->ACP = $request->ACP;
        $asistencia->temperatura = $request->temperatura;
        $asistencia->fecha_retorno = $request->fecha_retorno;
        $asistencia->hora_retorno = $request->hora_retorno;
        $asistencia->operacion_nacional = $request->operacion_nacional;
        $asistencia->procedencia = $request->procedencia;
        $asistencia->observaciones = $request->observaciones;

        Asistencia::create($request->all());
        return redirect()->back()->with('success', 'Asistencia exitoso');
    }

    public function destroy(Request $request){
        $id = $request->input('idasistencia');
        $asistencia = Asistencia::find($id);
        if($asistencia){
            $asistencia->delete();
            return redirect()->back()->with('success', 'Asistencia Borrado con exito');
        }else{
            return redirect()->back()->with('error', 'Asistencia no encontrada');
        }


    }

}
