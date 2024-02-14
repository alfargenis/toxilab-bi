<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;
use App\Http\Controllers\PdfController;
use Dompdf\Dompdf;

class ControllerDataMarts extends Controller
{
   public function index(){
            return view('admin.datamarts.index', [
                'app' => Application::all(),
                'title' => 'Data Marts'
            ]);
    }

    public function accounts(){
            return view('admin.datamarts.accounts', [
                'app' => Application::all(),
                'title' => 'Data Marts, cuentas predeterminadas'
            ]);
    }

    public function ReportAccounts()
    {
    // Lógica para obtener la colección de pacientes
    $patients = Patient::all(); // Por ejemplo, obtén la colección de pacientes según tu lógica
    // Lógica para calcular la cantidad de cuentas creadas en los últimos 30 días
    $new_accounts_last_30_days = Patient::where('created_at', '>=', now()->subDays(30))->count();
    // Lógica para calcular la cantidad de cuentas creadas en los 30 días anteriores
    $new_accounts_last_60_days = Patient::where('created_at', '>=', now()->subDays(60)) ->where('created_at', '<', now()->subDays(30))->count();
    // Lógica para determinar el cambio en la cantidad de cuentas nuevas
    $difference = $new_accounts_last_30_days - $new_accounts_last_60_days;
    $changeIcon = $difference >= 0 ? '▲' : '▼';
    $changeColor = $difference >= 0 ? 'green' : 'red';
    if ($changeColor === 'green') {
        $trend = 'alcista';
    } else {
        $trend = 'bajista';
    }
    $percentage = abs(($difference / $new_accounts_last_60_days) * 100);
    // Limitar el número de decimales en el porcentaje
    $percentage = number_format($percentage, 2); // Esto limita el porcentaje a dos decimales

    // Obtener los datos de los pacientes agrupados por mes
    $patientsByMonth = Patient::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    ->groupBy('month')
    ->get();
    // Inicializar arrays para almacenar los datos de los meses y las cantidades de pacientes
    $patientCounts = [];
    // Obtener los nombres de los meses y las cantidades de pacientes para cada mes
    foreach ($patientsByMonth as $patient) {
        $months[] = Carbon::create()->month($patient->month)->format('M');
        $patientCounts[] = $patient->total;
    }
    // Convertir el array $patientCounts a una cadena JSON
    $patientCountsJson = json_encode($patientCounts);

    // Generar el HTML con el script JavaScript
    $html = <<<HTML
    <body>
        <canvas id="lineChart" data-patient-counts="$patientCountsJson"></canvas>
        <script src="/assets/js/chartpatient.js"></script>

        <div id="report" style="display: flex; justify-content: space-between;">
        <div style="flex: 1; margin-right: 20px;">
            <h2>Informe de Pacientes</h2>
            <p>El gráfico anterior muestra la cantidad de pacientes creados por mes en los últimos meses.</p>

            <h3>Análisis de la cantidad de cuentas nuevas:</h3>
            <p>En los últimos 30 días, se crearon <strong>$new_accounts_last_30_days</strong> cuentas nuevas.</p>
            <p>En los 30 días anteriores, se crearon <strong>$new_accounts_last_60_days</strong> cuentas nuevas.</p>
            <p>La diferencia entre estos períodos es de <strong>$difference</strong> ($changeIcon $percentage%)
                <span style="color: $changeColor;">$changeIcon</span>
            </p>
        </div>

        <div style="flex: 1; margin-right: 20px;">
            <h3>Análisis de tendencias:</h3>
            <p>Basándonos en los datos mostrados en el gráfico, parece que hay una tendencia <strong>$trend</strong>.</p>
        </div>

        <div style="flex: 1;">
            <h3>Próximos pasos:</h3>
            <ul>
                <li>Realizar un análisis más profundo de la tendencia identificada.</li>
                <li>Investigar las causas del aumento o disminución de las cuentas nuevas.</li>
                <li>Explorar estrategias para mejorar la adquisición de nuevos pacientes.</li>
            </ul>
        </div>
    </div>
    </body>
    HTML;

        // Obtener los datos de los pacientes desde la base de datos
        $patients = Patient::all();

        // Inicializar un array para almacenar los estados de los pacientes
        $estadosPorCiudad = [];

        foreach ($patients as $patient) {
            // Extraer el estado de la dirección del paciente
            $estado = $patient->address;

            // Si ya existe la ciudad en el array, incrementar el contador
            if (isset($estadosPorCiudad[$estado])) {
                $estadosPorCiudad[$estado]++;
            } else {
                // Si no existe, inicializar el contador en 1
                $estadosPorCiudad[$estado] = 1;
            }
        }
        // Convertir el array a formato JSON para pasarlo al script de JavaScript
        // Convertir el array a formato JSON escapando los caracteres especiales
        $estadosPorCiudadJson = json_encode($estadosPorCiudad, JSON_UNESCAPED_UNICODE);

        // echo "<pre>";
        // print_r($estadosPorCiudadJson);
        // echo "</pre>";


        $mapa = <<<HTML

            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Agrega Chart.js -->

                <div style="display: flex; justify-content: space-between;">
                    <div style="flex-basis: 48%;">
                        <div id="map" style="height: 600px;"></div>
                    </div>
                    <div style="flex-basis: 52%;">
                <!-- Código de la gráfica de barras -->
                        <canvas id="barChart" style="width: 600px;"></canvas>
                    </div>
                </div>


            <script>
                // Inicializar el mapa
                var map = L.map('map').setView([10.4806, -66.9036], 7); // Centrar el mapa en Venezuela

                // Agregar capa de OpenStreetMap como base del mapa
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Datos de pacientes por estado (obtenidos desde PHP)
                var pacientes = {$estadosPorCiudadJson};
                // var pacientes = '<?php echo json_encode($estadosPorCiudadJson, JSON_UNESCAPED_UNICODE); ?>';

                 // Coordenadas de los estados de Venezuela
                var estados = {
                    "Amazonas": [3.4167, -65.8561],
                    "Anzoátegui": [9.3208, -64.6863],
                    "Apure": [7.8597, -67.4753],
                    "Aragua": [10.2353, -67.5917],
                    "Barinas": [8.6314, -70.2070],
                    "Bolívar": [6.2098, -65.7392],
                    "Carabobo": [10.0820, -67.8589],
                    "Cojedes": [9.3804, -68.2431],
                    "Delta Amacuro": [8.0100, -61.7500],
                    "Falcón": [11.1324, -69.3543],
                    "Guárico": [9.7559, -66.6746],
                    "Lara": [10.0410, -69.2406],
                    "Mérida": [8.5986, -71.1580],
                    "Miranda": [10.1293, -66.8766],
                    "Monagas": [9.2382, -63.4916],
                    "Nueva Esparta": [10.9985, -63.9113],
                    "Portuguesa": [9.2081, -69.9848],
                    "Sucre": [10.4496, -63.2590],
                    "Táchira": [7.8388, -72.4747],
                    "Trujillo": [9.3667, -70.4333],
                    "Vargas": [10.5779, -66.6523],
                    "Yaracuy": [10.3863, -68.7598],
                    "Zulia": [9.0000, -71.7500]
                };

                var personasPorEstado = {};

                // Agregar marcadores para cada ubicación de paciente y calcular pacientes por estado
                 Object.keys(pacientes).forEach(function(estado) {
                     var latlng = estados[estado];
                        if (latlng) {
                      // Si se encuentra la coordenada del estado, agregar marcador al mapa
                          L.marker(latlng).addTo(map)
                        .bindPopup(estado + ': ' + pacientes[estado] + ' pacientes');
                           // Contabilizar el número total de pacientes por estado
                        personasPorEstado[estado] = personasPorEstado[estado] ? personasPorEstado[estado] + pacientes[estado] : pacientes[estado];
                         }
                        });

                // Generar la gráfica de barras
                var ctx = document.getElementById('barChart').getContext('2d');
                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(personasPorEstado), // Obtener las ciudades como etiquetas
                        datasets: [{
                            label: 'Cantidad de personas por ciudad',
                            data: Object.values(personasPorEstado), // Obtener las cantidades de personas por ciudad
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'x'
                    }
                });
            </script>
HTML;



        // Pasa las variables a la vista
        return view('admin.datamarts.accounts', [
            'app' => Application::all(),
            'title' => 'Data Marts, Resumen de cuentas',
            'patients' => $patients,
            'new_accounts_last_30_days' => $new_accounts_last_30_days,
            'changeIcon' => $changeIcon,
            'changeColor' => $changeColor,
            'percentage' => $percentage,
            'new_accounts_last_60_days' => $new_accounts_last_60_days,
            'html' => $html,
            'mapa' => $mapa
             ]);
        }

}