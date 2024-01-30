@extends('layouts.main.index')
@section('container')


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
      <h5 class="card-title m-0 me-2 fw-bold mb-4">Importar Archivo</h5>

      <form action="/admin/files/file" method="post" enctype="multipart/form-data" class="file-import-form">
        @csrf
        <div class="mb-3">
          <label for="cadenatexto" class="form-label">Campo de tipo texto:</label>
          <input type="text" name="cadenatexto" class="form-control" size="20" maxlength="100">
        </div>

        <div class="mb-3">
          <label for="userfile" class="form-label">Enviar un nuevo archivo:</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="500000000"> {{-- 500MB --}}
          <input name="userfile" type="file" class="form-control">
        </div>

        <div class="mb-3">
          <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
      </form>

      <div class="mt-4">
        <p>
          Para importar un archivo, completa el campo de texto con la información necesaria y selecciona un archivo para
          enviar. El tamaño máximo permitido para los archivos es de 500MB.
        </p>
      </div>
    </div>
  </div>
</div>

@endsection


@endsection