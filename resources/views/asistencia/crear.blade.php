@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registro de Vehículos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('registro.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="conductor_id" class="form-label">Conductor</label>
            <select id="conductor_id" name="conductor_id" class="form-control" required>
                <option value="">Seleccione un conductor</option>
                @foreach($conductores as $conductor)
                    <option value="{{ $conductor->id }}">{{ $conductor->nombre }} {{ $conductor->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select id="vehiculo_id" name="vehiculo_id" class="form-control" required>
                <option value="">Seleccione un vehículo</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}">{{ $vehiculo->modelo }} - {{ $vehiculo->marca }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="muelle_id" class="form-label">Muelle</label>
            <select id="muelle_id" name="muelle_id" class="form-control" required>
                <option value="">Seleccione un muelle</option>
                @foreach($muelles as $muelle)
                    <option value="{{ $muelle->id }}">{{ $muelle->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ruta_id" class="form-label">Ruta</label>
            <select id="ruta_id" name="ruta_id" class="form-control" required>
                <option value="">Seleccione una ruta</option>
                @foreach($rutas as $ruta)
                    <option value="{{ $ruta->id }}">{{ $ruta->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="matricula_id" class="form-label">Matrícula</label>
            <select id="matricula_id" name="matricula_id" class="form-control" required>
                <option value="">Seleccione una matrícula</option>
                @foreach($matriculas as $matricula)
                    <option value="{{ $matricula->id }}">{{ $matricula->codigo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="color_id" class="form-label">Color</label>
            <select id="color_id" name="color_id" class="form-control" required>
                <option value="">Seleccione un color</option>
                @foreach($colores as $color)
                    <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Registro</button>
    </form>
</div>
@endsection