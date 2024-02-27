@extends('layouts.main.index')
@section('container')

<style>
  .file-import-container {
    width: 100%;
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
      <h5 class="card-title m-0 me-1 fw-bold mb-1">Constructor de Informes</h5>

      <form action="{{ route('modulo0.index') }}" method="post" class="file-import-form">
        @csrf
        <div class="mb-1">
          <label for="consultaTexto" class="form-label">Escribe tu consulta:</label>
          <input type="text" name="consultaTexto" class="form-control" placeholder="Ingresa tu consulta aquí" required>
        </div>

        <div class="mb-0,5">
          <input type="submit" value="Enviar Consulta" class="btn btn-primary">
        </div>
      </form>

      <div class="mt-4">
        <p>
          Introduce tu pregunta en el campo de arriba y recibirás una respuesta gráfica acompañada de un resumen informativo.
        </p>
      </div>
    </div>
  </div>
</div>

@if(isset($respuesta))
  <div class="container mt-5"> <!-- Contenedor principal -->
    <div class="row mb-5"> <!-- Sección de respuesta con margen inferior -->
      <div class="col-12">
        <div class="card"> 
          <div class="card-body">
            {!! $respuesta !!}
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center"> <!-- Sección del formulario, centrada y con espaciado -->
      <div class="col-md-8 col-lg-6">
        <!-- Contenedor del formulario para darle una presentación distinta -->
        <div class="card">
          <div class="card-body">
            <form action="{{ route('collectiondata.index') }}" method="POST" class="p-3">
              @csrf
              <div class="mb-3">
                <label for="nombreInforme" class="form-label">Nombre del Informe</label>
                <input type="text" class="form-control" name="nombreInforme" id="nombreInforme" placeholder="Nombre del Informe" required>
              </div>
              <input type="hidden" name="respuestaGeminis" value="{{ $respuesta }}">
              <button type="submit" class="btn btn-primary">Guardar Informe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif




@endsection
