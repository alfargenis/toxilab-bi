<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;

class ControllerCollectionData extends Controller
{
    public function index()
    {
        return view('admin.collectiondata.index', [
            'app' => Application::all(),
            'title' => 'Collection Data'
          ]);
    }
}