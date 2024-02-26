@extends('layouts.main.index')
@section('container')

<style>
  .file-import-container {
    max-width: 500px;
    margin: auto;
  }

  .file-import-form {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
  }
</style>

<div class="file-import-container">
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title m-0 me-2 fw-bold mb-4">Realiza informes rapidamente con AI</h5>

      <form action="{{ route('modulo0.index') }}" method="post" class="file-import-form">
        @csrf
        <div class="mb-3">
          <label for="consultaTexto" class="form-label">Escribe tu consulta:</label>
          <input type="text" name="consultaTexto" class="form-control" placeholder="Ingresa tu consulta aquí" required>
        </div>

        <div class="mb-3">
          <input type="submit" value="Enviar Consulta" class="btn btn-primary">
        </div>
      </form>

      <div class="mt-4">
        <p>
          Introduce tu pregunta en el campo de arriba y recibirás una respuesta gráfica acompañada de un resumen informativo.
        </p>
        <p>
          Debido al trafico de red tu consulta puede generar un error, esto puede solucionarse realizando nuevamente la consulta.
        </p>
      </div>
    </div>
  </div>
</div>

@if(isset($respuesta))
<div class="col-md-6 col-lg-7 order-2 mb-4">
    <div class="card h-100">
      <div class="card-body">
        {!! $respuesta !!}
      </div>
    </div>
  </div>
</div>
@endif

@endsection
