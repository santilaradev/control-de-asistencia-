@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Eliminar Asistencia</h1>
    
    <form action="{{ route('asistencia.destroy') }}" method="POST">
        @csrf
        @method('delete')
        <div class="from-group">
            <label class="form-label">id del vehiculo:</label>
            <input type="text" id="idasistencia" class="form-control" name="idasistencia" required>
        </div>
    
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </div>
    </form>
    @if(session('error'))
    <div class="alert alert-success" role="aler"> 
        {{ session('error')}}
    </div>
    @endif
</div>
@endsection
