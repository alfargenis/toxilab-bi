<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;

class ControllerDataMarts extends Controller
{
    public function index()
    {
        return view('admin.datamarts.index', [
            'app' => Application::all(),
            'title' => 'Data Marts'
          ]);
    }

    public function cuentas()
    {
        return view('admin.datamarts.cuentas', [
            'app' => Application::all(),
            'title' => 'Data Marts, cuentas predeterminadas'
          ]);
    }

    public function mostrar()
    {
        // Lógica para obtener la colección de pacientes, por ejemplo:
        $patients = Patient::all();  // Esto es solo un ejemplo, ajusta según tu lógica real
        // Pasar la variable $patients a la vista
        return view('admin.datamarts.cuentas', ['app' => Application::all(),'title' => 'Data Marts, cuentas predeterminadas','patients' => $patients]);
    }
}