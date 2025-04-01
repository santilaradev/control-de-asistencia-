@extends('layouts.app')
@section('content')
@php
use carbon\carbon;
@endphp
<h1>Lista de Registros</h1>
<table class="table table-bordered table-striped bg-light">
<thead>
    
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Hora de salida</th>
      <th scope="col">placa del vehiculo</th>
      <th scope="col">Vehiculo</th>
      <th scope="col">Nombre del Conductor</th>
      <th scope="col">Precinto de salida</th>
      <th scope="col">Color</th>
      <th scope="col">Ruta</th>
      <th scope="col">Muelle</th>
      <th scope="col">ACP</th>
      <th scope="col">Temperatura</th>
      <th scope="col">Fecha de retorno</th>
      <th scope="col">Hora de retorno</th>
      <th scope="col">Operacion Nacional</th>
      <th scope="col">Procedencia</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($asistencias as $asistencia)
      <td>{{ Carbon::parse($asistencia->fecha)->format('d/m/y')}}</td>
      <td>{{ Carbon::parse($asistencia->hora_salida)->format('h:i A')}}</td>
      <td>{{ $asistencia->placa_del_vehiculo }}</td>
      <td>{{ $asistencia->vehiculo }}</td>
      <td>{{ $asistencia->nombre_conductor }}</td>
      <td>{{ $asistencia->precinto_salida }}</td>
      <td>{{ $asistencia->color }}</td>
      <td>{{ $asistencia->ruta }}</td>
      <td>{{ $asistencia->muelle }}</td>
      <td>{{ $asistencia->ACP }}</td>
      <td>{{ $asistencia->temperatura }}</td>
      <td>{{ $asistencia->fecha_retorno }}</td>
      <td>{{ $asistencia->hora_retorno }}</td>
      <td>{{ $asistencia->operacion_nacional }}</td>
      <td>{{ $asistencia->procedencia}}</td>
      <td>{{ $asistencia->observaciones}}</td>
      <td>
      <div class="d-flex gap-2">
        <!-- Botón Crear -->
         <a href="{{ route('asistencia.crear') }}" class="btn btn-success">
          <i class="fas fa-plus"></i> Crear
         </a>

    <!-- Botón Editar -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal{{ $asistencia->id }}">
            <i class="fas fa-edit"></i> Editar
          </button>
           @include('asistencia.editar')
        

    <!-- Botón Eliminar -->
       <form action="{{ route('asistencia.destroy', $asistencia->id) }}" method="POST">
           @csrf
           @method('DELETE')
          <button type="submit" class="btn btn-danger">
             <i class="fas fa-trash"></i> Eliminar
          </button>
        </form>
</div>
      </td>
    </tr>
     @endforeach
  </tbody>
  </table>
  

  @if(session('success'))
    <div class="col-12 mt-4">
      <table class="table table-bordered text-white">
      </table>
        {{ session('success')}}
    </div>

  @endif
@endsection