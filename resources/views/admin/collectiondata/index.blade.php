@extends('layouts.main.index')

@section('container')
<style>
  .badge-personalizado {
    background-color: white; /* Un color de fondo personalizado */
    color: #696cff; /* Color del texto */
  }
</style>

<div class="col-md-8 col-lg-8 mx-auto">
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="collectionTabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="informes-tab" data-bs-toggle="tab" href="#informes" role="tab" aria-controls="informes" aria-selected="true">Informes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="archivos-tab" data-bs-toggle="tab" href="#archivos" role="tab" aria-controls="archivos" aria-selected="false">Archivos</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="collectionTabsContent">
        <div class="tab-pane fade show active" id="informes" role="tabpanel" aria-labelledby="informes-tab">
          <ul class="list-group">
            @foreach($resultados as $index => $resultado)
              <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                <!-- <a href="javascript:void(0)" onclick="mostrarInforme('{{ $index }}')">{{ $resultado->name }}</a> -->
                <a href="javascript:void(0)" onclick="mostrarInformePDF('{{ $resultado->pdf_path }}')">{{ $resultado->name }}</a>
                @if (isset($admin))
                  <span class="badge badge-personalizado ms-2">Creado por: {{ $admin }} en {{ $resultado->created_at->format('d/m/Y') }}</span>
                @endif
              </li>
            @endforeach
          </ul>
        </div>
        <div class="tab-pane fade" id="archivos" role="tabpanel" aria-labelledby="archivos-tab">
          <ul class="list-group">
            @foreach($archivos as $archivo)
              <li class="list-group-item mb-2">
                Nombre del archivo: {{ $archivo->nombre_archivo }}
                | Subido: {{ $archivo->created_at->format('d/m/Y') }} |
                <a href="{{ asset('storage/uploads/' . $archivo->nombre_archivo) }}" target="_blank">Ver archivo</a> 
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
      <!-- Contenedor para mostrar el informe seleccionado -->
      <div class="container mt-5"> <!-- Contenedor principal -->
        <div class="row mb-5"> <!-- Sección de respuesta con margen inferior -->
          <div class="col-12">
            <div class="card">
              <!-- Inicialmente oculto hasta que se haga clic en un informe -->
              <div id="cardBody" class="card-body" style="display: none;">
                <div id="contenedorInforme" class="mt-5"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
  function mostrarInformePDF(pdfPath) {
  // Asumiendo que la ruta pdfPath ya incluye el prefijo "informes/"
  const fullPath = '/' + pdfPath; // Asegura que la ruta sea relativa a la raíz del dominio
  window.open(fullPath, '_blank');
}
function mostrarInforme(index) {
  // Referencia al contenedor del informe y al card-body
  var contenedorInforme = document.getElementById('contenedorInforme');
  var cardBody = document.getElementById('cardBody');

  // Asegurarse de que todos los informes estén inicialmente ocultos
  document.querySelectorAll('.informe').forEach(function(el) {
    el.style.display = 'none';
  });

  // Mostrar el informe seleccionado
  var informeSeleccionado = document.getElementById('informe' + index);
  if (informeSeleccionado) {
    contenedorInforme.innerHTML = informeSeleccionado.innerHTML;
    // Mostrar tanto el contenedor del informe como el card-body
    contenedorInforme.style.display = 'block';
    cardBody.style.display = 'block';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('archivos-tab').addEventListener('click', function() {
    document.getElementById('cardBody').style.display = 'none';
  });
});
</script>

@foreach($resultados as $index => $resultado)
  <div id="informe{{ $index }}" style="display: none;">
    {!! $resultado->informe !!}
  </div>
@endforeach

@endsection
