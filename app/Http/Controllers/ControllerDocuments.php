<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\documents;
use App\Models\QueueNumber;
use Carbon\Carbon;

class ControllerDocuments extends Controller
{
    public function index()
    {
        return view('admin.files.index', [
            'app' => Application::all(),
            'title' => 'Importacion de Archivos'
          ]);
    }  
    public function uploadFile(Request $request)
    {
        if (!$request->hasFile('userfile')) {
            return response()->json(['error' => 'No se ha seleccionado ningún archivo para subir.'], 400);
        }
    
        $archivo = $request->file('userfile');
    
        $validator = Validator::make(
            ['archivo' => $archivo],
            ['archivo' => 'required|file|max:2048']
        );
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
    
        $nombre_archivo = $archivo->getClientOriginalName();
        $tamano_archivo = $archivo->getSize();
        $tipo_archivo = $archivo->getClientMimeType();
        $ruta_destino = 'uploads/' . $nombre_archivo;
    
        if (Documents::where('nombre_archivo', $nombre_archivo)->exists()) {
            return response()->json(['error' => "El archivo $nombre_archivo ya existe en la base de datos."], 400);
        }
    
        try {
            Storage::put($ruta_destino, file_get_contents($archivo->getRealPath()));
        } catch (\Exception $e) {
            return response()->json(['error' => "Error al mover el archivo: " . $e->getMessage()], 500);
        }
    
        try {
            $documento = Documents::create([
                'nombre_archivo' => $nombre_archivo,
                'tipo_archivo' => $tipo_archivo,
                'tamano_archivo' => $tamano_archivo,
                'ruta_archivo' => $ruta_destino,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => "Error al guardar la información del archivo en la base de datos: " . $e->getMessage()], 500);
        }
    
        return response()->json(['success' => "El archivo $nombre_archivo se ha subido correctamente.", 'documento' => $documento], 200);
    }
    
    
}
