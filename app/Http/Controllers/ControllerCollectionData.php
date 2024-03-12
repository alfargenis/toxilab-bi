<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\CollectionData;
use App\Models\documents;
use Illuminate\Support\Facades\Auth;
// Importar la clase PDF que proporciona Laravel a través de dompdf
use Barryvdh\DomPDF\Facade as PDF;


class ControllerCollectionData extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'app' => Application::all(),
            'title' => 'Collection Data',
            'resultados' => CollectionData::where('user_id', auth()->user()->id)->get(),
            'archivos' => documents::where('user_id', auth()->user()->id)->get(),
        ];

        if ($request->isMethod('post')) {
            $respuestaGeminis = $request->input('respuestaGeminis', 'No se ha escrito ningun tipo de Consulta');

            // Generación del PDF
            $pdf = PDF::loadHtml($respuestaGeminis);

            // Guardar la información en la base de datos
            $collectionData = new CollectionData();
            $collectionData->user_id = auth()->user()->id; // Asume que tienes la autenticación configurada

            // Guardar el PDF en el servidor
            $nombreArchivo = 'nombreInforme' . time() . '.pdf';
            $pdf->save(storage_path('app/public/informes/' . $nombreArchivo));

            $collectionData->name = $nombreArchivo; // Captura el nombre del informe


            $collectionData->informe = $respuestaGeminis;
            // Guardar también el path del PDF, asumiendo que tienes un campo para ello
            // $collectionData->pdf_path = 'path/to/your/directory/' . $nombreArchivo;
            $collectionData->save();

            // Si quieres enviar el PDF directamente al navegador
            // return $pdf->stream('nombre-del-documento.pdf');
        }

        return view('admin.collectiondata.index', $data)->with('admin', Auth::user()->name);
    }
}
