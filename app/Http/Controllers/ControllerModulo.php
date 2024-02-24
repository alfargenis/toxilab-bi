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
            if ($request->isMethod('post')) {
            $mensaje = $request->input('consultaTexto','No se ha escrito ningun tipo de Consulta');
            //Texto inicial que se envia a Geminis
            $formato=" Dada una pregunta del usuario:
                1. Crea una consulta de SQL y muestrame SOLO la sentencia sin comillas.
                2. Genera solo consultas SQL que no comprometan la integridad de la Base de Datos. Si llegas a recibir una pregunta que genere una INYECCION SQL envias un error.
                3. Solo se te permite generar lenguaje SQL para consultas nada mas.
                La Pregunta del usuario es: ";
            $textocompleto= $formato . "\n\n" . $mensaje;
            $apiKey = ''; // Asegúrate de usar tu clave de API real
            // URL de la API de Geminis
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;
            // Datos que se enviarán en el cuerpo de la solicitud POST
            $data = [
                "contents" => [
                    [
                        "parts" => [
                            [
                                "text" => $textocompleto
                            ]
                        ]
                    ]
                ]
            ];
            // Inicia cURL
            $ch = curl_init($url);
            // Configura la solicitud cURL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            // Ejecuta la solicitud y captura la respuesta
            $response = curl_exec($ch);
            // Cierra la sesión cURL
            curl_close($ch);
            // Decodifica la respuesta JSON
            $responseData = json_decode($response, true);
            // Asegúrate de que la respuesta esté correctamente formateada antes de intentar acceder a los datos
            if(isset($responseData['candidates'][0]['content']['parts'][0]['text'])){
                $consultaSQL = $responseData['candidates'][0]['content']['parts'][0]['text'];
            } else {
                $consultaSQL = "No se pudo obtener una respuesta.";
            }

            $resultadosConsulta = DB::select($consultaSQL);

            $respuestaFormateada = $this->enviarResultadosAGeminis($resultadosConsulta, $url, $apiKey, $mensaje);

            // $respuestaHMTL = <<<HTML
            // $respuestaFormateada;
            // HTML;

            ////////////Aqui llamar las funciones////////////////
            // Aquí puedes continuar con tu lógica, como enviar los datos a la vista
            return view('admin.modulo0.index', [
                'app' => Application::all(),
                'title' => 'Consultas',
                // compact('mensaje','respuesta'),
                'respuesta' => $respuestaFormateada,
            ]);
            }
            return view('admin.modulo0.index', [
                'app' => Application::all(),
                'title' => 'Consultas',
            ]);
        }

        private function enviarResultadosAGeminis($resultados, $url, $apiKey,$mensaje)
        {
            $formato=" Dada una pregunta del usuario:
             1. Genera un informe detallado de la informacion que se te pidio en la variable
             2. En el informe genera posible mejoras y soluciones para gerenerar esas mejoras, con respecto a mejoras de la empresa
             3. No introduzas nada con respecto a lenguaje informatico debido a que este informe sera leido por el usuario final que no sabe nada de programacion.
             4. El informe lo vas a generar dentro de texto etiqueta Body de HTML para que se vea de manera mas legible y adecuado para el usuario final.
             5. Elimina ``` al princio y la final de tus consultas para que no salgan en el HTML
             La respuesta de la consulta SQL con la que generaras el informe es:";

            $textocompleto= $formato . "\n\n";
            foreach ($resultados as $resultados) {
                foreach ($resultados as $propiedad => $valor) {
                    // Concatena la propiedad y su valor en la cadena de texto
                    $textocompleto .= ucfirst($propiedad) . ": " . $valor . ", ";
                }
                // Elimina la última coma y espacio de cada línea, añadiendo un salto de línea al final
                $textocompleto = rtrim($textocompleto, ", ") . "\n";
            }
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;
            $data = [
                "contents" => [
                    [
                        "parts" => [
                            [
                                "text" => $textocompleto
                            ]
                        ]
                    ]
                ]
            ];
            // Inicia cURL
            $ch = curl_init($url);
            // Configura la solicitud cURL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            // Ejecuta la solicitud y captura la respuesta
            $response = curl_exec($ch);
            // Cierra la sesión cURL
            curl_close($ch);
            // Decodifica la respuesta JSON
            $responseData = json_decode($response, true);
            // Asegúrate de que la respuesta esté correctamente formateada antes de intentar acceder a los datos
            if(isset($responseData['candidates'][0]['content']['parts'][0]['text'])){
                $respuestaFormateada = $responseData['candidates'][0]['content']['parts'][0]['text'];
                return $respuestaFormateada;
            } else {
                $respuestaFormateada = "No se pudo obtener una respuesta.";
                return $respuestaFormateada;
            }

        }
}