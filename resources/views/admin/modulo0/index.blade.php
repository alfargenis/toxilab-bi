@extends('layouts.main.index')
@section('container')
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.css">
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.js"></script>
</head>

<style>
  .apexcharts-legend-series {
    display: none;
  }

  .apexcharts-title-text {
    font-size: 1rem;
    font-weight: 700 !important;
  }
</style>

<!-- Contenido actual de tu vista -->

<div class="row">
  <!-- ... Otros elementos de la página ... -->

  <!-- Chart de Edades de Pacientes -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">Edades de Pacientes</h5>
      </div>
      <div class="card-body">
        <div id="agesChart"></div>
      </div>
    </div>
  </div>

  <!-- Chart de Pacientes del Día -->
  <div class="col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">Pacientes del Día</h5>
      </div>
      <div class="card-body">
        <div id="patientsTodayChart"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.js"></script>

<script>
  // Código para inicializar y configurar los gráficos
  var agesOptions = 8;{
    // Opciones del gráfico de edades
  };

  var patientsTodayOptions = 15;{
    // Opciones del gráfico de pacientes del día
  };

  var agesChart = new ApexCharts(document.querySelector("#agesChart"), agesOptions);
  var patientsTodayChart = new ApexCharts(document.querySelector("#patientsTodayChart"), patientsTodayOptions);

  // Asigna los datos a los gráficos (debes tener los datos disponibles)
  agesChart.render();
  patientsTodayChart.render();
</script>


@endsection