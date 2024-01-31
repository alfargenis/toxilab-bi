@extends('layouts.main.index')
@section('container')
<!-- Agrega en el encabezado del layout -->
<head>
  <!-- ... Otros enlaces y estilos ... -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.js"></script>
</head>

<div class="row">
  <!-- Gráfico de Reactivos -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">Reactivos más utilizados</h5>
      </div>
      <div class="card-body">
        <div id="reactivesChart"></div>
      </div>
    </div>
  </div>

  <!-- Gráfico de Máquinas -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">Máquinas de procesamiento</h5>
      </div>
      <div class="card-body">
        <div id="machinesChart"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.js"></script>

<script>
  // Datos simulados (debes reemplazar con tus datos reales)
  var reactivesData = {
    series: [50, 30, 20], // Ejemplo de datos
    labels: ['Reactivo A', 'Reactivo B', 'Reactivo C'] // Ejemplo de etiquetas
  };

  var machinesData = {
    series: [40, 25, 35], // Ejemplo de datos
    labels: ['Máquina X', 'Máquina Y', 'Máquina Z'] // Ejemplo de etiquetas
  };

  // Configuración del gráfico de reactivos
  var reactivesOptions = {
    chart: {
      type: 'donut'
    },
    labels: reactivesData.labels,
    series: reactivesData.series,
    // Otras opciones de configuración si es necesario
  };

  // Configuración del gráfico de máquinas
  var machinesOptions = {
    chart: {
      type: 'donut'
    },
    labels: machinesData.labels,
    series: machinesData.series,
    // Otras opciones de configuración si es necesario
  };

  var reactivesChart = new ApexCharts(document.querySelector("#reactivesChart"), reactivesOptions);
  var machinesChart = new ApexCharts(document.querySelector("#machinesChart"), machinesOptions);

  // Renderizar los gráficos
  reactivesChart.render();
  machinesChart.render();
</script>

@endsection

