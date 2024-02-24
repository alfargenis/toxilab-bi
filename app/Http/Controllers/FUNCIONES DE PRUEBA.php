<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Patient;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Exception;

class ControllerModulo extends Controller
{
    public function index()
        {
            //Texto inicial que se envia a Geminis
            $formato=" Dada una pregunta del usuario:
                1. crea una consulta de SQL
                2. Revisa los resultados
                3. devuelve el dato
                4. si tienes que hacer alguna aclaracion o delvolver texto que sea siempre en español.
                La Pregunta del usuario es: ";
            $mensaje = "Muestrame cuantos registros hay en la tabla patients, utilizando Eloquent ORM de Laravel sin comentarios y en codigo limpio sin colocar el tipo de lenguaje";
            $textocompleto= $formato . "\n\n" . $mensaje;
            $apiKey = 'AIzaSyBbhLyHcrbAvGfxTnGCJwXg_ERYf4zP848'; // Asegúrate de usar tu clave de API real
            // URL de la API de Geminis
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;



            // Paso 1: Envía la pregunta a Geminis para obtener la consulta SQL
            $consultaSQL = $this->obtenerConsultaDeGeminis($textocompleto, $url);

            // Paso 2: Ejecuta la consulta SQL en la base de datos
            $resultadosConsulta = DB::select(DB::raw($consultaSQL));

            // Paso 3: Envía los resultados a Geminis para obtener una respuesta formateada
            $respuestaGeminis = $this->enviarResultadosAGeminis($resultadosConsulta, $url);

            // Aquí puedes continuar con tu lógica, como enviar los datos a la vista
            return view('admin.modulo0.index', [
                'app' => Application::all(),
                'title' => 'Consultas',
                'mensaje' => $textocompleto,
                'respuesta' => $respuestaGeminis,
            ]);
        }

        private function obtenerConsultaDeGeminis($pregunta, $url) {
            // Prepara el cuerpo de la solicitud con la pregunta
            $body = [
                "contents" => [
                    [
                        "parts" => [
                            [
                                "text" => $pregunta
                            ]
                        ]
                    ]
                ]
            ];
        
            // Realiza la solicitud POST a la API de Geminis
            $response = Http::withHeaders([
             'Content-Type' => 'application/json',
            ])->post($url, $body);
        
            // Verifica si la solicitud fue exitosa para extraer la consulta SQL
            if ($response->successful()) {
                // Extrae la consulta SQL usando la estructura proporcionada
                $consultaSQL = $response->json()['candidates'][0]['content']['parts'][0]['text'];
                return $consultaSQL;
            } else {
                $errorContent = $response->json();
                 $error = $errorContent['error'] ?? 'Error desconocido al comunicarse con Geminis';
                if (is_array($error)) {
                    $errorMensaje = json_encode($error);
              } else {
                     $errorMensaje = $error;
                    }
                throw new \Exception("La solicitud a Geminis falló: $errorMensaje");
            }
        }

        private function enviarResultadosAGeminis($resultados, $url)
        {
            // Transforma los resultados de la consulta a un formato JSON para enviar a Geminis
            $datosFormateados = json_encode(['resultados' => $resultados]);

            // Realiza la solicitud POST a Geminis con los resultados formateados
            $response = Http::withHeaders([
               'Content-Type' => 'application/json',
            ])->post($url, [
                // Asegúrate de ajustar el cuerpo de la solicitud según lo que espera Geminis
                'data' => [
                    "contents" => [
                        [
                            "parts" => [
                                [
                                    "text" => $datosFormateados
                                ]
                            ]
                        ]
                    ]
                ],
            ]);

            // Verifica si la solicitud fue exitosa para extraer la respuesta
            if ($response->successful()) {
                // Extrae la respuesta usando la estructura proporcionada
                $respuestaGeminis = $response->json()['candidates'][0]['content']['parts'][0]['text'];
                return $respuestaGeminis;
            } else {
                $errorContent = $response->json();
                $error = $errorContent['error'] ?? 'Error desconocido al comunicarse con Geminis';
               if (is_array($error)) {
                   $errorMensaje = json_encode($error);
             } else {
                    $errorMensaje = $error;
                   }
                throw new \Exception("La solicitud a Geminis falló: $errorMensaje");
            }
        }














            // // Datos que se enviarán en el cuerpo de la solicitud POST
            // $data = [
            //     "contents" => [
            //         [
            //             "parts" => [
            //                 [
            //                     "text" => $textocompleto
            //                 ]
            //             ]
            //         ]
            //     ]
            // ];
            // // Inicia cURL
            // $ch = curl_init($url);
            // // Configura la solicitud cURL
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            // // Ejecuta la solicitud y captura la respuesta
            // $response = curl_exec($ch);
            // // Cierra la sesión cURL
            // curl_close($ch);
            // // Decodifica la respuesta JSON
            // $responseData = json_decode($response, true);
            // // Asegúrate de que la respuesta esté correctamente formateada antes de intentar acceder a los datos
            // if(isset($responseData['candidates'][0]['content']['parts'][0]['text'])){
            //     $recibido = $responseData['candidates'][0]['content']['parts'][0]['text'];
            // } else {
            //     $recibido = "No se pudo obtener una respuesta.";
            // }
            
}
