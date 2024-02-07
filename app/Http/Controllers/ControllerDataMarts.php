<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;

class ControllerDataMarts extends Controller
{
   public function index(){
            return view('admin.datamarts.index', [
                'app' => Application::all(),
                'title' => 'Data Marts'
            ]);
    }

    public function accounts(){
            return view('admin.datamarts.acconts', [
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
    $new_accounts_last_60_days = Patient::where('created_at', '>=', now()->subDays(60))
                                        ->where('created_at', '<', now()->subDays(30))
                                        ->count();
    // Lógica para determinar el cambio en la cantidad de cuentas nuevas
    $difference = $new_accounts_last_30_days - $new_accounts_last_60_days;
    $changeIcon = $difference >= 0 ? '▲' : '▼';
    $changeColor = $difference >= 0 ? 'green' : 'red';
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
        <link rel="stylesheet" type="text/css" href="/public/assets/css/toast.css">
        <body>
            <canvas id="lineChart">
                    <script>
                        var ctx = document.getElementById('lineChart').getContext('2d');
                        var months = "Ene,Feb,Mar,Abr,May,Jun,Jul,Ago,Sep,Oct,Nom,Dic";
                        var monthsArray = months.split(",");
                        var data = $patientCountsJson; // Utilizar la cadena JSON aqui

                        var chartConfig = {
                            type: 'line',
                            data: {
                                labels: monthsArray,
                                datasets: [{
                                    label: 'Número de pacientes',
                                    data: $patientCountsJson, // Utilizar la cadena JSON aqui
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        };
                        var lineChart = new Chart(ctx, chartConfig);
                    </script>
            </canvas>
        </body>
        HTML;

        // Pasa las variables a la vista
        return view('admin.datamarts.accounts', [
            'app' => Application::all(),
            'title' => 'Data Marts, cuentas predeterminadas',
            'patients' => $patients,
            'new_accounts_last_30_days' => $new_accounts_last_30_days,
            'changeIcon' => $changeIcon,
            'changeColor' => $changeColor,
            'percentage' => $percentage,
            'new_accounts_last_60_days' => $new_accounts_last_60_days,
            'html' => $html
             ]);
        }


}