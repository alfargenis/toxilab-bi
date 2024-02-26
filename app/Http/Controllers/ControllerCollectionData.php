<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Patient;
use App\Models\QueueNumber;
use Carbon\Carbon;
use App\Models\CollectionData; // Asegúrate de importar tu modelo en la parte superior
use FontLib\Table\Type\name;

class ControllerCollectionData extends Controller
{
    public function index(Request $request)
    {
        $data = ['app' => Application::all(), 'title' => 'Collection Data'];

        if ($request->isMethod('post')) {
            $respuestaGeminis = $request->input('respuestaGeminis', 'No se ha escrito ningun tipo de Consulta');
            $collectionData = new CollectionData();
            $collectionData->name = 'prueba';
            $collectionData->informe = $respuestaGeminis;
            $collectionData->save();
            session()->flash('success', 'Datos guardados correctamente');
        }

        $data['resultados'] = CollectionData::all(); // Asegúrate de tener esta línea fuera del if

        return view('admin.collectiondata.index', $data);
    }

    // public function mostrarResultados() {
    //     $resultados = CollectionData::all(); // Recupera todos los registros
    //     return view('admin.collectiondata.index', ['app' => Application::all(),'title' => 'Collection Data','resultados'=>$resultados]);
    // }

}