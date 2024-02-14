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

                // Ejemplo de ubicaciones de clientes
                var clientes = [
                    { nombre: 'Argenis Rodriguez', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente B', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Upata' },
                    { nombre: 'Cliente C', latitud: 10.4804, longitud: -66.9035, ciudad: 'Caracas' },
                    { nombre: 'Cliente D', latitud: 10.1622, longitud: -64.6806, ciudad: 'Barcelona' },
                    { nombre: 'Cliente E', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente F', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente G', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente H', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente I', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente J', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente K', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente L', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente M', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente N', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente O', latitud: 8.27509, longitud: -62.7556955, ciudad: 'Puerto Ordaz' },
                    { nombre: 'Cliente P', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Upata' },
                    { nombre: 'Cliente Q', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Upata' },
                    { nombre: 'Cliente R', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Upata' },
                    { nombre: 'Cliente S', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Upata' },
                    { nombre: 'Cliente S', latitud: 8.0073377, longitud: -62.3977917, ciudad: 'Tumeremo' },

                    // Agrega más ubicaciones según sea necesario
                ];

                // Contador de personas por ciudad
                var personasPorCiudad = {};

                // Agregar marcadores para cada ubicación de cliente y calcular personas por ciudad
                clientes.forEach(function(cliente) {
                    L.marker([cliente.latitud, cliente.longitud]).addTo(map)
                        .bindPopup(cliente.nombre + '<br>' + cliente.ciudad); // Mostrar nombre del cliente y ciudad en el popup

                    if (personasPorCiudad[cliente.ciudad]) {
                        personasPorCiudad[cliente.ciudad]++;
                    } else {
                        personasPorCiudad[cliente.ciudad] = 1;
                    }
                });

                // Generar la gráfica de barras
                var ctx = document.getElementById('barChart').getContext('2d');
                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(personasPorCiudad), // Obtener las ciudades como etiquetas
                        datasets: [{
                            label: 'Cantidad de personas por ciudad',
                            data: Object.values(personasPorCiudad), // Obtener las cantidades de personas por ciudad
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