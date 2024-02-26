<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyPatientsChart;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $chart = $this->chart();
        $currentMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        return view('admin.dashboard.index', [
            'app' => Application::all(),
            'title' => 'Dashboard',
            'totalLakiLaki' => Patient::where('gender', 'Laki-Laki')->whereNotNull('queue_number_id')->count(),
            'totalPerempuan' => Patient::where('gender', 'Perempuan')->whereNotNull('queue_number_id')->count(),
            'patients' => Patient::orderBy('created_at', 'desc')->take(10)->get()->reverse()->values(),
            'patientsToday' => Patient::where('queue_number_id', null)->whereDate('created_at', now()->toDateString())->count(),
            'patientsYesterday' => Patient::where('queue_number_id', null)->whereDate('created_at', now()->subDay(7)->toDateString())->count(),
            'patientsMonthly' => Patient::where('queue_number_id', null)->whereBetween('created_at', [$currentMonth, $endOfMonth])->count(),
            'totalPatient' => Patient::where('queue_number_id', null)->count(),
            'numberQueueNow' => Patient::with(['queueNumber'])->orderby('queue_number_id', 'asc')->whereNotNull('queue_number_id')->first(),
            'chart' => $chart,
        ]);
    }

    private function chart(){

        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalPasien = Patient::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->get();
            $dataBulan[] = Carbon::create()->month($i)->locale('id')->isoFormat('MMMM');
            $totalPasienLakiLaki[] = $totalPasien->where('gender', 'Masculino')->count();
            $totalPasienPerempuan[] = $totalPasien->where('gender', 'Femenino')->count();
        }
        $totalPasienLakiLakiJSON = json_encode($totalPasienLakiLaki);
        $totalPasienPerempuanJSON = json_encode($totalPasienPerempuan);

        $html = <<<HTML

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <canvas id="genderChart"></canvas>

        <script>
            var hombres = {$totalPasienLakiLakiJSON};
            var mujeres = {$totalPasienPerempuanJSON};

            var tahum = {$tahun};
            const ctx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Masculino', 'Femenino'],
                    datasets: [{
                        label: 'Total de pacientes atendidos en el año ' + tahum,
                        data: [hombres.reduce((a, b) => a + b, 0), mujeres.reduce((a, b) => a + b, 0)], // Asegúrate de que 'hombres' y 'mujeres' sean valores numéricos, no arreglos
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 4,
                    }
                ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Distribución de Género de Pacientes en ' + tahum
                        }
                    }
                },
            });
        </script>
        HTML;
        return $html;
    }

}
