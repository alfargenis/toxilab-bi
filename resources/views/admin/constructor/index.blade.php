@extends('layouts.main.index')

@section('container')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>



<div class="container mt-4">
    <h1 class="mb-4">{{ $title }}</h1>
    <div class="mb-3">
    <form action="{{ route('mostrarDatosTabla') }}">
        @csrf
        <div class="row">
            <!-- Ajusta el tamaño de las columnas para hacer los selects más pequeños y alinearlos horizontalmente -->
            <div class="col-md-3">
                <select name="tablaSeleccionada" class="form-select" onchange="this.form.submit()">
                    <option disabled selected>Seleccione una tabla</option>
                    @foreach($tables as $tableName)
                        <option value="{{ $tableName }}" @if(isset($tablaActual) && $tablaActual == $tableName) selected @endif>{{ $tableName }}</option>
                    @endforeach
                </select>
            </div>
            @if(isset($datosTabla) && count($datosTabla) > 0)
            <!-- Coloca este select dentro de la misma fila ('row') que el anterior para que estén al lado el uno del otro -->
            <div class="col-md-3">
                <select name="columnaEtiquetas" class="form-select" id="columnaEtiquetas">
                    <option disabled selected value="">Seleccione la columna para etiquetas</option>
                    @foreach(array_keys((array)$datosTabla[0]) as $columna)
                        <option value="{{ $columna }}" @if(old('columnaEtiquetas', $columnaEtiquetas ?? '') == $columna) selected @endif>{{ ucfirst($columna) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="columnaEtiquetas2" class="form-select" id="columnaEtiquetas2" style="display: none;">
                    <option disabled selected value="">Seleccione la columna para etiquetas</option>
                    @foreach(array_keys((array)$datosTabla[0]) as $columna)
                        <option value="{{ $columna }}" @if(old('columnaEtiquetas2', $columnaEtiquetas2 ?? '') == $columna) selected @endif>{{ ucfirst($columna) }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="col-auto">
                <button id="toggleDatosBtn" type="button" class="btn btn-primary mb-3">Ver Datos</button>
            </div>
        </div>
    </form>
</div>
<!-- El botón 'Ver Datos' se mantiene fuera del form y de los ajustes realizados arriba -->
<!-- <button id="toggleDatosBtn" class="btn btn-primary mb-3">Ver Datos</button> -->

        <!-- PDF -->
        <div id="contentToConvert">
                <div class="container mt-5"> <!-- Contenedor principal -->
                    <div class="row mb-5"> <!-- Sección de respuesta con margen inferior -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="display: none;">
                                    <div class="chart-container" style="position: relative; height:40vh; width:80vw;">
                                        <canvas id="myChart"></canvas>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div id="contentToConvert3">
                <div class="container mt-5"> <!-- Contenedor principal -->
                    <div class="row mb-5"> <!-- Sección de respuesta con margen inferior -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body-3" style="display: none;">
                                    <div class="chart-container" style="position: relative; height:40vh; width:80vw;">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div id="contentToConvert">
                <div class="container mt-5"> <!-- Contenedor principal -->
                    <div class="row mb-5"> <!-- Sección de respuesta con margen inferior -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body-2" style="display: none;">
                                    @if(isset($datosTabla) && count($datosTabla) > 0)
                                        <div id="datosYGráfica" style="display: none;">
                                            <div class="table-responsive">
                                                <table id="miTabla" class="table table-bordered table-hover">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            @foreach(array_keys((array)$datosTabla[0]) as $columna)
                                                                <th>{{ ucfirst($columna) }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($datosTabla as $fila)
                                                            <tr>
                                                                @foreach($fila as $valor)
                                                                    <td>{{ $valor }}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                        </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        <!-- PDF-->
</div>
<!-- GUARDAR EN BASE DE DATOS COMO PDF  -->
<div class="row justify-content-center"> <!-- Sección del formulario, centrada y con espaciado -->
      <div class="col-md-8 col-lg-6">
        <!-- Contenedor del formulario para darle una presentación distinta -->
        <div class="card">
          <div class="card-body">
            <form action="{{ route('constructor.coleccion') }}" method="POST" class="p-3" id="pdfForm">
              @csrf
              <div class="mb-3">
                <input type="text" class="form-control" name="nombreInforme" id="nombreInforme" placeholder="Nombre del Informe" required>
              </div>
              <input type="hidden" name="chartData" id="chartInputData">
              <input type="hidden" name="htmlContent" id="hiddenHtml">
              <input type="hidden" id="tableImageData" name="tableImageData">
              <button type="submit" class="btn btn-primary">Guardar Informe</button>
            </form>
          </div>
        </div>
      </div>
</div>


@if(session('nombreArchivo'))
    <script>
        window.onload = function() {
            var nombreArchivo = "{{ session('nombreArchivo') }}";
            var url = "{{ url('/informes') }}/" + nombreArchivo;
            window.open(url, '_blank');
        }
    </script>
@endif
<!-- GUARDAR EN BASE DE DATOS COMO PDF  -->

    <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('pdfForm').addEventListener('submit', function(e) {
                         e.preventDefault(); // Detener el envío normal del formulario
                        const chartCanvas = document.getElementById('myChart');
                        if (chartCanvas) {
                            const chartImageURL = chartCanvas.toDataURL('image/png');
                            document.getElementById('chartInputData').value = chartImageURL;
                        }
                        const htmlContent = document.getElementById('contentToConvert').innerHTML;
                        document.getElementById('hiddenHtml').value = htmlContent;

                       // Convertir la tabla en una imagen base64 y almacenar en otro input oculto
                        const tableElement = document.getElementById('miTabla'); // Asegúrate de que este es el ID de tu tabla
                        if (tableElement) {
                            html2canvas(tableElement).then(canvas => {
                                document.getElementById('tableImageData').value = canvas.toDataURL('image/png'); // Asegúrate de tener un input con este ID para la tabla
                                e.target.submit();// form.submit(); // Descomenta si detuviste el envío del formulario con preventDefault()
                            });
                        } else {
                            // Si no hay tabla, envía el formulario directamente
                            e.target.submit();
                        }
                    });
                });

                
                $(document).ready(function() {
                var toggleDatosBtn = $('#toggleDatosBtn');
                var datosYGráficaDiv = $('#datosYGráfica');
                var columnaEtiquestas2 = $('#columnaEtiquetas2');
                var cardBody = $('.card-body'); // Selector para el card-body
                var cardBody2 = $('.card-body-2'); // Selector para el card-body
                var cardBody3 = $('.card-body-3'); // Selector para el card-body
                var guardar = $('.guardar')
                var ctx = $('#myChart').get(0).getContext('2d');
                var myChart = null; // Inicializa la variable de la gráfica como null
                var ctx2 = $('#myChart2').get(0).getContext('2d');
                var myChart2 = null; // Inicializa la variable de la gráfica como null

                toggleDatosBtn.click(function() {
                    datosYGráficaDiv.toggle();
                    toggleDatosBtn.text(datosYGráficaDiv.is(':visible') ? 'Ocultar Datos' : 'Ver Datos');
                    cardBody2.show();
                });

                // Inicializar DataTable
                $('#miTabla').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    }
                });

                // Listener para el cambio de selección en el selector de columna de etiquetas
                $('select[name="columnaEtiquetas"]').on('change', function() {
                    if ($(this).val()) {
                        cardBody.show();
                        columnaEtiquestas2.show();
                    if (!myChart) {
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [],
                                datasets: [{
                                    label: 'Datos Seleccionados',
                                    data: [],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                    actualizarGrafica($(this).val());
                    }
                });

                function actualizarGrafica(columnaSeleccionada) {
                    // Obtén el índice basado en el valor seleccionado en lugar del índice en el select
                    var indexColumna = $('option:selected', 'select[name="columnaEtiquetas"]').index() - 1;
                    var labels = [];
                    var data = [];

                    // Asegúrate de tener una instancia válida de myChart antes de intentar actualizarla
                    if (myChart && indexColumna >= 0) {
                        $('#miTabla tbody tr').each(function() {
                            var cellValue = $(this).find('td').eq(indexColumna).text();
                            if (data[cellValue]) {
                                data[cellValue] += 1;
                            } else {
                                data[cellValue] = 1;
                                labels.push(cellValue);
                            }
                        });

                        var dataArray = Object.values(data);
                        myChart.data.labels = labels;
                        myChart.data.datasets.forEach((dataset) => {
                            dataset.data = dataArray;
                        });
                        myChart.update();
                    }
                }
            });                                                                                 
            // Listener para el cambio de selección en el selector de columna de etiquetas
            $('select[name="columnaEtiquetas2"]').on('change', function() {
                    if ($(this).val()) {
                        cardBody3.show();
                    if (!myChart2) {
                        myChart2 = new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: [],
                                datasets: [{
                                    label: 'Datos Seleccionados',
                                    data: [],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                    actualizarGrafica2($(this).val());
                    }
                });

                function actualizarGrafica2(columnaSeleccionada2) {
                    // Obtén el índice basado en el valor seleccionado en lugar del índice en el select
                    var indexColumna = $('option:selected', 'select[name="columnaEtiquetas2"]').index() - 1;
                    var labels = [];
                    var data = [];

                    // Asegúrate de tener una instancia válida de myChart antes de intentar actualizarla
                    if (myChart2 && indexColumna >= 0) {
                        $('#miTabla tbody tr').each(function() {
                            var cellValue = $(this).find('td').eq(indexColumna).text();
                            if (data[cellValue]) {
                                data[cellValue] += 1;
                            } else {
                                data[cellValue] = 1;
                                labels.push(cellValue);
                            }
                        });

                        var dataArray = Object.values(data);
                        myChart2.data.labels = labels;
                        myChart2.data.datasets.forEach((dataset) => {
                            dataset.data = dataArray;
                        });
                        myChart2.update();
                    }
                }
    </script>

@endsection
