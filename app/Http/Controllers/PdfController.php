<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // HTML que quieres convertir en PDF
        $html = view('admin.datamarts.accounts')->render();

        // Crear una nueva instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // (Opcional) Configurar opciones de Dompdf (puedes ajustar según tus necesidades)
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF al navegador para su descarga
        return $dompdf->stream('documento.pdf');
    }
}
//pasar esto para el controlador datamarts
