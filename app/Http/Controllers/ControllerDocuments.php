<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\documents;
use App\Models\QueueNumber;
use Carbon\Carbon;
use Psy\CodeCleaner\AssignThisVariablePass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class ControllerDocuments extends Controller
{
    public function showUploadForm()
    {
        return view('admin.files.file', ['app' => Application::all(), 'title' => 'Importación de Archivos']);
    }
    public function uploadFile(Request $request)
    {
            if ($request->isMethod('post')){
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
                    return back()->withErrors(['error' => "El archivo $nombre_archivo ya existe en la base de datos."]);

                }

                try {
                    Storage::put($ruta_destino, file_get_contents($archivo->getRealPath()));
                } catch (\Exception $e) {
                    return back()->withErrors(['error' => 'No se ha seleccionado ningún archivo para subir.']);
                }

                try {
                    $documento = Documents::create([
                        'nombre_archivo' => $nombre_archivo,
                        'tipo_archivo' => $tipo_archivo,
                        'tamano_archivo' => $tamano_archivo,
                        'ruta_archivo' => $ruta_destino,
                        'user_id' => auth()->user()->id,
                    ]);
                    return redirect()->to('/admin/files/')->with('success', 'Se ha cargado el archivo '.$nombre_archivo.' correctamente');
                } catch (\Exception $e) {
                    return back()->withErrors(['error' => 'No se ha seleccionado ningún archivo para subir.']);
                }
            }
    }

}