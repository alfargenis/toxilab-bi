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
      <i class="bx bx-user"></i>  Reportes de Clientes.
      </h5>
    </div>
    <div class="card-body">
    <p>Profundiza en las métricas clave que te permiten segmentar a tu audiencia para campañas dirigidas, mejorar la retención de clientes y aumentar la satisfacción del consumidor. Con datos enriquecidos y visualizaciones interactivas, estarás equipado para tomar decisiones estratégicas que impulsen el crecimiento de la relación con tus clientes.</p>
    </div>
  </button>
</div>

<div class="col-md-6 mb-4  {{ Request::is('admin/datamarts/compras*') ? 'active' : '' }}" >
  <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/compras'" >
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-shopping-bag"></i>  Reportes de Compras.
        </h5>
      </div>
      <div class="card-body">
        <p>Una visión clara de las operaciones comerciales y la salud financiera. Aprende cuáles productos son los más vendidos, identifica patrones estacionales y monitoriza la eficiencia de tus canales de venta. Mejora la precisión de tus pronósticos de ventas y optimiza tus estrategias de compra con información valiosa y actualizada.</p>
      </div>
    </button>
  </div>

  <div class="col-md-6 mb-4  {{ Request::is('admin/datamarts/producto*') ? 'active' : '' }}" >
  <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/producto'" >
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-bar-chart-alt"></i>  Reporte de Pruebas.
        </h5>
      </div>
      <div class="card-body">
        <p>Proporciona análisis en profundidad de las pruebas, márgenes de beneficio. Descubre oportunidades para innovar y expandir tu línea de pruebas, asegurando que tu oferta se mantenga relevante y altamente competitiva en el mercado.</p>
      </div>
    </button>
  </div>


  <div class="col-md-6 mb-4 {{ Request::is('admin/datamarts/equipos*') ? 'active' : '' }}">
    <button type="button" class="btn card h-100 custom-button" onclick="window.location.href='/admin/datamarts/equipos'">
      <div class="card-header">
        <h5 class="card-title m-0 me-2 fw-bold mb-2">
          <i class="bx bx-globe"></i>  Reportes de Equipos de Analisís.
        </h5>
      </div>
      <div class="card-body">
        <p>Ofrece información sobre la utilización de equipos, eficiencia operativa y costos asociados. Optimiza la gestión de tus activos y asegura una alta disponibilidad y rendimiento de tus equipos críticos para el análisis de datos y la ejecución de tareas de alta prioridad en la investigación y el desarrollo de tu negocio.</p>
      </div>
    </button>
  </div>

</div>

@endsection
