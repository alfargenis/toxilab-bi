<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Patient;

class ControllerModulo extends Controller
{
    public function index()
        {
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
                $recibido = $responseData['candidates'][0]['content']['parts'][0]['text'];
            } else {
                $recibido = "No se pudo obtener una respuesta.";
            }
            // Aquí puedes continuar con tu lógica, como enviar los datos a la vista
            return view('admin.modulo0.index', [
                'app' => Application::all(),
                'title' => 'Consultas',
                'mensaje' => $textocompleto,
                'datos' => $recibido, // Asegúrate de pasar el mensaje extraído correctamente
                'prueba' => $responseData,
            ]);
    }
}