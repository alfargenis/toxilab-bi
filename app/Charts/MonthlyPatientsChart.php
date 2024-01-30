<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Patient;

class MonthlyPatientsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalPasien = Patient::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->get();
            $dataBulan[] = Carbon::create()->month($i)->locale('id')->isoFormat('MMMM');
            $totalPasienLakiLaki[] = $totalPasien->where('gender', 'Laki-Laki')->count();
            $totalPasienPerempuan[] = $totalPasien->where('gender', 'Perempuan')->count();
        }
        return $this->chart->lineChart()
            ->setTitle('Estadistica de Pacientes')
            ->setSubtitle('Total de pacientes atendidos en el año ' . $tahun)
            ->addData('Masculino', $totalPasienLakiLaki)
            ->addData('Femenino', $totalPasienPerempuan)
            ->setXAxis($dataBulan)
            ->setFontFamily('Poppins')
            ->setFontColor('#566a7f')
            ->setColors(['#696cff', '#ff6384']);
    }

    //pruebaaaaaaaaaaaaaaaaaaa
    public function buildAgeChart(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        // Obtener datos de edades
        $ageData = [
            // Aquí debes proporcionar los datos de las edades de los pacientes
            // Puedes obtener estos datos según tus necesidades
            // Ejemplo: ['Menores de 18', 30], ['18-30', 50], ['31-50', 20], ['Mayores de 50', 10]
        ];

        return $this->chart->donutChart()
            ->setTitle('Distribución de Edades de Pacientes')
            ->addData($ageData)
            ->setLabels(['Menores de 18', '18-30', '31-50', 'Mayores de 50'])
            ->setFontFamily('Poppins')
            ->setFontColor('#566a7f')
            ->setColors(['#4caf50', '#ffeb3b', '#ff9800', '#f44336']);
    }

    public function buildPatientsTodayChart(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Obtener datos de pacientes del día
        $patientsTodayData = [
            // Aquí debes proporcionar los datos de los pacientes del día
            // Puedes obtener estos datos según tus necesidades
            // Ejemplo: ['Atendidos', 80], ['No atendidos', 20]
        ];

        return $this->chart->pieChart()
            ->setTitle('Estado de Pacientes del Día')
            ->addData($patientsTodayData)
            ->setLabels(['Atendidos', 'No atendidos'])
            ->setFontFamily('Poppins')
            ->setFontColor('#566a7f')
            ->setColors(['#2196f3', '#f44336']);
    }
}

