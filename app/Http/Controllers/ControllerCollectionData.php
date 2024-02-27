<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;
use App\Models\CollectionData; // Asegúrate de importar tu modelo en la parte superior
use FontLib\Table\Type\name;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ControllerCollectionData extends Controller
{
    public function index(Request $request)
    {
        $data = ['app' => Application::all(), 'title' => 'Collection Data'];

        if ($request->isMethod('post')) {
            $respuestaGeminis = $request->input('respuestaGeminis', 'No se ha escrito ningun tipo de Consulta');
            $collectionData = new CollectionData();
            $collectionData->user_id = auth()->user()->id; // Asume que tienes la autenticación configurada
            $collectionData->name = $request->input('nombreInforme'); // Captura el nombre del informe
            $collectionData->informe = $respuestaGeminis;
            $collectionData->save();
        }
        $data['resultados'] = CollectionData::where('user_id', auth()->user()->id)->get();
        return view('admin.collectiondata.index', $data)->with('admin', Auth::user()->name);
    }

}