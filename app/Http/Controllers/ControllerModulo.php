<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Patient;
use Illuminate\Http\Request; // Asegúrate de importar Request
use Illuminate\Support\Facades\DB;

class ControllerModulo extends Controller
{
    public function index(Request $request)
        {
            if ($request->isMethod('post')) {//Vista POST
            $mensaje = $request->input('consultaTexto','No se ha escrito ningun tipo de Consulta'); //Texto del Usuario
            $rules="/Users/Arge/Documents/PHP/toxilab-bi/resources/rules/rules.txt";//Reglas de consultas SQL.
            $textocompleto= $formato = file_get_contents($rules) . "\n\n" . $mensaje; //Formato + Texto
            $url = env('GEMINIS_API_URL') . '?key=' . env('GEMINIS_API_KEY'); // Construye la URL usando la variable de entorno
            try {
                $consultaUno = $this->cRUL($this->dataStructure($textocompleto),$url); //Generea consulta SQL
            } catch (\Exception $e) {
                // En caso de error en la consulta SQL, captura la excepción y redirige con un mensaje de error.
                return redirect()->back()->withInput()->with('error', 'Hubo un error en la consulta generada. Por favor, intenta de nuevo.');
            }

        return view('admin.modulo0.index', ['app' => Application::all(),'title' => 'Consultas','respuesta' => $consultaUno,]);
            }
        return view('admin.modulo0.index', ['app' => Application::all(),'title' => 'Consultas',]);}//Vista GET sino se hace consulta

        private function enviarResultadosAGeminis($resultados, $url)
        {
            $rules="/Users/Arge/Documents/PHP/toxilab-bi/resources/rules/rulesInform.txt";
            $formato= file_get_contents($rules);
            $textocompleto= $formato . "\n\n";

            foreach ($resultados as $resultados) {
                foreach ($resultados as $propiedad => $valor) {$textocompleto .= ucfirst($propiedad) . ": " . $valor . ", ";}
                $textocompleto = rtrim($textocompleto, ", ") . "\n";}
            return $respuestaFormateada = $this->cRUL($this->dataStructure($textocompleto),$url);
        }

        private function cRUL($data,$url){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Configura la solicitud cURL
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); // Configura la solicitud cURL
            curl_setopt($ch, CURLOPT_POST, true); // Configura la solicitud cURL
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Configura la solicitud cURL
            $response = curl_exec($ch); // Ejecuta la solicitud y captura la respuesta
            curl_close($ch);// Cierra la sesión cURL
            $responseData = json_decode($response, true); // Decodifica la respuesta JSON
            if(isset($responseData['candidates'][0]['content']['parts'][0]['text'])){ //extrae el texto de la respuesta del array
                $respuestaG = $responseData['candidates'][0]['content']['parts'][0]['text'];//extrae el texto de la respuesta del array
                return $respuestaG;
            } else { $respuestaG = "No se pudo obtener una respuesta."; //En casos de error
                return $respuestaG;
            }
        }

        private function dataStructure($textocompleto){
            $data = ["contents" => [["parts" => [["text" => $textocompleto]]]]]; //Genera la estructura data
                return $data;
        }
}