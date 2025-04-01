@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Eliminar Asistencia</h1>
    
    <form id="deleteForm" action="{{ route('asistencia.destroy') }}" method="POST">
        @csrf
        @method('delete')
        <div class="form-group">
            <label class="form-label">ID del vehículo:</label>
            <input type="text" id="idasistencia" class="form-control" name="idasistencia" required>
        </div>
    
        <div class="mt-4 text-center">
            <!-- Botón que activa el modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
                Eliminar
            </button>
        </div>
    </form>

    @if(session('error'))
    <div class="alert alert-danger mt-3" role="alert"> 
        {{ session('error') }}
    </div>
    @endif
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar esta asistencia?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Sí, eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar la confirmación -->
<script>
    document.getElementById('confirmDelete').addEventListener('click', function () {
        document.getElementById('deleteForm').submit();
    });
</script>

@endsection
