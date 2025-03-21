@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1 class="mb-4 text-center">Registrar Asistencia</h1>
    
    <form action="{{ route('asistencia.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Fecha:</label>
                <input type="date" id="fecha" class="form-control" name="fecha" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Hora de Salida:</label>
                <input type="time" id="hola_salida" class="form-control" name="hora_salida">
            </div>
            <div class="col-md-4">
                <label class="form-label">Placa del Vehículo:</label>
                <input type="text" id="placa_del_vehiculo" class="form-control" name="placa_del_vehiculo" required>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Vehículo:</label>
                <input type="text" id="vehiculo" class="form-control" name="vehiculo" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nombre del Conductor:</label>
                <input type="text" id="nombre_conductor" class="form-control" name="nombre_conductor" required>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-4">
                <label class="form-label">Precinto de Salida:</label>
                <input type="text" id="precinto_salida" class="form-control" name="precinto_salida">
            </div>
            <div class="col-md-4">
                <label class="form-label">Color:</label>
                <input type="text" id="color" class="form-control" name="color">
            </div>
            <div class="col-md-4">
                <label class="form-label">Ruta:</label>
                <input type="text" id="ruta" class="form-control" name="ruta">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-4">
                <label class="form-label">Muelle:</label>
                <input type="text" id="muelle" class="form-control" name="muelle">
            </div>
            <div class="col-md-4">
                <label class="form-label">ACP:</label>
                <input type="text" id="ACP" class="form-control" name="ACP">
            </div>
            <div class="col-md-4">
                <label class="form-label">Temperatura:</label>
                <input type="number" id="temperatura" class="form-control" step="0.1" name="temperatura">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-4">
                <label class="form-label">Fecha de Retorno:</label>
                <input type="date" id="fecha_retorno" class="form-control" name="fecha_retorno">
            </div>
            <div class="col-md-4">
                <label class="form-label">Hora de Retorno:</label>
                <input type="time" id="hora_retorno" class="form-control" name="hora_retorno">
            </div>
            <div class="col-md-4">
                <label class="form-label">Operación Nacional:</label>
                <input type="text" id="operacion_nacional" class="form-control" name="operacion_nacional">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Procedencia:</label>
                <input type="text" id="procedencia" class="form-control" name="procedencia">
            </div>
            <div class="col-md-6">
                <label class="form-label">Observaciones:</label>
                <textarea  class="form-control" name="observaciones" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    @if(session('success'))
    <div class="alert alert-success" role="aler"> 
        {{ session('success')}}
    </div>
    @endif
</div>
@endsection
