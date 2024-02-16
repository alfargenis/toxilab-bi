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

  .custom-button {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .card-title {
    margin-bottom: 0.5rem;
  }

  .card-body {
    text-align: justify;
  }
</style>

<div class="row">
<div class="col-md-6 mb-4  {{ Request::is('admin/datamarts/accounts*') ? 'active' : '' }}" >
  <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/accounts'" >
    <div class="card-header">
      <h5 class="card-title m-0 me-2 fw-bold mb-2">
      <i class="bx bx-user"></i>  Reportes de Clientes
      </h5>
    </div>
    <div class="card-body">
    <p>Accede a reportes específicos sobre tus clientes, su comportamiento y preferencias.</p>
    </div>
  </button>
</div>

<div class="col-md-6 mb-4  {{ Request::is('admin/datamarts/compras*') ? 'active' : '' }}" >
  <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/compras'" >
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-shopping-bag"></i>  Reportes de Compras y Ventas
        </h5>
      </div>
      <div class="card-body">
        <p>Visualiza resúmenes detallados de tus transacciones de compras y ventas.</p>
      </div>
    </button>
  </div>

  <div class="col-md-6 mb-4  {{ Request::is('admin/datamarts/producto*') ? 'active' : '' }}" >
  <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/producto'" >
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-bar-chart-alt"></i>  Reporte de Productos.
        </h5>
      </div>
      <div class="card-body">
        <p>Analiza eventos analíticos para tomar decisiones informadas sobre tu negocio.</p>
      </div>
    </button>
  </div>


  <div class="col-md-6 mb-4">
    <button type="button" class="btn card h-100 custom-button">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-globe"></i>  Reportes de Equipos de Analisís.
        </h5>
      </div>
      <div class="card-body">
        <p>Visualiza ..............</p>
      </div>
    </button>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.29.0/dist/apexcharts.min.js"></script>

{{-- Script de gráficos (si es necesario) --}}
<script>
  // Código para inicializar y configurar los gráficos (si es necesario)
  // ...
</script>

@endsection
