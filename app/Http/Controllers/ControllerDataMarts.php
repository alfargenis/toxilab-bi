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
}