<div class="modal fade" id="modal{{ $asistencia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('asistencia.update', $asistencia->id) }}">
          @csrf
          @method('PUT')

          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Fecha:</label>
              <input type="date" id="fecha" value="{{ \Carbon\Carbon::parse($asistencia->fecha)->format('Y-m-d') }}" class="form-control" name="fecha" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Hora de Salida:</label>
              <input type="time" id="hora_salida" value="{{ $asistencia->hora_salida ? \Carbon\Carbon::parse($asistencia->hora_salida)->format('H:i') : '' }}" class="form-control" name="hora_salida">
            </div>
            <div class="col-md-4">
              <label class="form-label">Placa del Vehículo:</label>
              <input type="text" id="placa_del_vehiculo" value="{{ $asistencia->placa_del_vehiculo }}" class="form-control" name="placa_del_vehiculo" required>
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label class="form-label">Vehículo:</label>
              <input type="text" id="vehiculo" value="{{ $asistencia->vehiculo }}" class="form-control" name="vehiculo" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nombre del Conductor:</label>
              <input type="text" id="nombre_conductor" value="{{ $asistencia->nombre_conductor }}" class="form-control" name="nombre_conductor" required>
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <label class="form-label">Precinto de Salida:</label>
              <input type="text" id="precinto_salida" value="{{ $asistencia->precinto_salida }}" class="form-control" name="precinto_salida">
            </div>
            <div class="col-md-4">
              <label class="form-label">Color:</label>
              <input type="text" id="color" value="{{ $asistencia->color }}" class="form-control" name="color">
            </div>
            <div class="col-md-4">
              <label class="form-label">Ruta:</label>
              <input type="text" id="ruta" value="{{ $asistencia->ruta }}" class="form-control" name="ruta">
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <label class="form-label">Muelle:</label>
              <input type="text" id="muelle" value="{{ $asistencia->muelle }}" class="form-control" name="muelle">
            </div>
            <div class="col-md-4">
              <label class="form-label">ACP:</label>
              <input type="text" id="ACP" value="{{ $asistencia->ACP }}" class="form-control" name="ACP">
            </div>
            <div class="col-md-4">
              <label class="form-label">Temperatura:</label>
              <input type="number" id="temperatura" value="{{ $asistencia->temperatura }}" class="form-control" step="0.1" name="temperatura">
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <label class="form-label">Fecha de Retorno:</label>
              <input type="date" id="fecha_retorno" value="{{ $asistencia->fecha_retorno ? \Carbon\Carbon::parse($asistencia->fecha_retorno)->format('Y-m-d') : '' }}" class="form-control" name="fecha_retorno">
            </div>
            <div class="col-md-4">
              <label class="form-label">Hora de Retorno:</label>
              <input type="time" id="hora_retorno" value="{{ $asistencia->hora_retorno ? \Carbon\Carbon::parse($asistencia->hora_retorno)->format('H:i') : '' }}" class="form-control" name="hora_retorno">
            </div>
            <div class="col-md-4">
              <label class="form-label">Operación Nacional:</label>
              <input type="text" id="operacion_nacional" value="{{ $asistencia->operacion_nacional }}" class="form-control" name="operacion_nacional">
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-md-6">
              <label class="form-label">Procedencia:</label>
              <input type="text" id="procedencia" value="{{ $asistencia->procedencia }}" class="form-control" name="procedencia">
            </div>
            <div class="col-md-6">
              <label class="form-label">Observaciones:</label>
              <textarea id="observaciones" class="form-control" name="observaciones" rows="3">{{ $asistencia->observaciones }}</textarea>
            </div>
          </div>

          <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

