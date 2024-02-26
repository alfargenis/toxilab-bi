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

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalPasien = Patient::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->get();
            $dataBulan[] = Carbon::create()->month($i)->locale('id')->isoFormat('MMMM');
            $totalPasienLakiLaki[] = $totalPasien->where('gender', 'Masculino')->count();
            $totalPasienPerempuan[] = $totalPasien->where('gender', 'Femenino')->count();
        }
        return $this->chart->donutChart()
            ->setTitle('Estadistica de Pacientes')
            ->setSubtitle('Total de pacientes atendidos en el año ' . $tahun)
            ->addData([$totalPasienLakiLaki,$totalPasienPerempuan])
            ->setLabels(['Masculino', 'Femenino'])
            ->setXAxis($dataBulan)
            ->setFontFamily('Poppins')
            ->setFontColor('#566a7f')
            ->setColors(['#696cff', '#ff6384']);
    }

}

