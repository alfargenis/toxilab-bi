<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\CollectionData; // Asegúrate de importar tu modelo en la parte superior
use Illuminate\Support\Facades\Auth;
use App\Models\documents; // Asegúrate de usar la ruta correcta al modelo // Importa también el modelo CollectionData si aún no lo has hecho


class ControllerCollectionData extends Controller
{
    public function index(Request $request)
    {
        $data = ['app' => Application::all(), 'title' => 'Collection Data',
        'resultados' => CollectionData::where('user_id', auth()->user()->id)->get(),
        'archivos' => documents::where('user_id', auth()->user()->id)->get(),
        ];

        if ($request->isMethod('post')) {
            $respuestaGeminis = $request->input('respuestaGeminis', 'No se ha escrito ningun tipo de Consulta');
            $collectionData = new CollectionData();
            $collectionData->user_id = auth()->user()->id; // Asume que tienes la autenticación configurada
            $collectionData->name = $request->input('nombreInforme'); // Captura el nombre del informe
            $collectionData->informe = $respuestaGeminis;
            $collectionData->save();
        }
        return view('admin.collectiondata.index', $data)->with('admin', Auth::user()->name);
    }

}