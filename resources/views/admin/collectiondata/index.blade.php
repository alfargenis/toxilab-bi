@extends('layouts.main.index')
@section('container')

<!-- Breve reseña sobre la funcionalidad de esta página -->
<div class="mb-4 text-center">
    <p>En esta sección puedes visualizar y gestionar tanto informes como archivos. Selecciona un informe o archivo para ver su contenido detallado.</p>
</div>

<div class="col-md-8 col-lg-8 mx-auto">
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="collectionTabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="informes-tab" data-toggle="tab" href="#informes" role="tab" aria-controls="informes" aria-selected="true">Informes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="archivos-tab" data-toggle="tab" href="#archivos" role="tab" aria-controls="archivos" aria-selected="false">Archivos</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="collectionTabsContent">
        <div class="tab-pane fade show active" id="informes" role="tabpanel" aria-labelledby="informes-tab">
          <ul class="list-group">
            @foreach($resultados as $resultado)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#!" onclick="mostrarInforme('{{ $loop->index }}')">{{ $resultado->name}}</a>
                @if (isset($admin))
                <span class="badge bg-secondary">Creado por: {{ $admin }} en {{ $resultado->created_at->format('d/m/Y') }}</span>
                @endif
              </li>
            @endforeach
          </ul>
          @foreach($resultados as $resultado)
            <div class="informe" id="informe{{ $loop->index }}" style="display: none;">
              {!! $resultado->informe !!}
            </div>
          @endforeach
        </div>
        <div class="tab-pane fade" id="archivos" role="tabpanel" aria-labelledby="archivos-tab">
          <!-- Aquí iría el código para mostrar tus archivos, similar a cómo muestras los informes -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function mostrarInforme(index) {
  document.querySelectorAll('.informe').forEach(function(el) {
    el.style.display = 'none';
  });
  document.getElementById('informe' + index).style.display = 'block';
}
</script>

@endsection
