<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\CollectionData;
use App\Models\documents;
use Illuminate\Support\Facades\Auth;
// Importar la clase PDF que proporciona Laravel a través de dompdf
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use TCPDF;

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
                $nombreInforme = $request->input('nombreInforme', 'InformeSinNombre'); // Captura el nombre del informe
                require_once 'TCPDF/examples/tcpdf_include.php';
                require_once 'TCPDF/tcpdf.php';


                    // create new PDF document
                $pdf = new MYPDF (PDF_PAGE_ORIENTATION. 'P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Toxi-Lab C.A.');
                $pdf->SetTitle($nombreInforme); //aqui va el nombre del informe

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING, array(0,0,0), array(0,64,0));
                $pdf->setFooterData(array(0,4,0), array(0,64,128));
                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // Establece el código y la fecha
                $codigo = time();
                $fecha = date('d-m-Y'); // Ejemplo de fecha
                $pdf->setCodigo($codigo);
                $pdf->setFecha($fecha);
                // ---------------------------------------------------------

                // set default font subsetting mode
                $pdf->setFontSubsetting(true);
                // Set font
                $pdf->SetFont('dejavusans', '', 12, '', true);
                // Add a page
                // This method has several options, check the source code documentation for more information.
                $pdf->AddPage();
                // set text shadow effect
                $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
                // Set some content to print

                $html = <<<EOD
                $respuestaGeminis
                EOD;
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

                // Asume que $pdf es tu objeto TCPDF ya configurado y listo para generar el PDF
                $nombreArchivo = $nombreInforme . '.pdf'; // Formato del nombre de archivo
                $rutaArchivo = public_path('informes/' . $nombreArchivo); // Define la ruta completa
                // Guarda el PDF en el servidor
                $pdf->Output($rutaArchivo, 'F');
                // $pdf->Output($rutaArchivo, 'I');

                $collectionData = new CollectionData(); // Crea instancia de CollectionData (modelo de tu base de datos)
                $collectionData->user_id = auth()->user()->id; // Asume que tienes la autenticación configurada
                $collectionData->name = $nombreArchivo; // Captura el nombre del informe
                $collectionData->informe = $respuestaGeminis; // Guarda el informe tipo texto plano
                $collectionData->pdf_path = 'informes/' . $nombreArchivo; // Guardar el path del PDF en el servidor
                $collectionData->save(); // Guarda el registro en la base de datos
                return redirect()->back()->with(['nombreArchivo' => $nombreArchivo]);
            }
        return view('admin.collectiondata.index', $data)->with('admin', Auth::user()->name);
    }




    public function verPDF($nombreArchivo)
    {
        $path = public_path('informes/' . $nombreArchivo);
        if (file_exists($path)) {
            return response()->file($path);
        } else {
            return response()->json(['error' => 'Archivo no encontrado.'], 404);
        }
    }

}
require_once 'TCPDF/examples/tcpdf_include.php';
require_once 'TCPDF/tcpdf.php';


class MYPDF extends TCPDF {

    // Propiedades para almacenar el código y la fecha
    public $codigo = '';
    public $fecha = '';
    public $nombreEmpresa = 'TOXI-LAB C.A. RIF: J-30208958-1';

    public $logoEmpresa = 'TCPDF/logotoxilab.png';
    // Método para configurar el código
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    // Método para configurar la fecha
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    // Encabezado personalizado
    public function Header() {
        $this->Image($this->logoEmpresa, 10, -8, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Nombre de la empresa y estilo
        $this->SetFont('helvetica', 'I', 10);
        $this->SetTextColor(0, 0, 0); // Color negro
        $this->SetXY(60, 10); // Ajusta estas coordenadas según sea necesario
        $this->Write(0, $this->nombreEmpresa);
        $this->SetXY(60, 15); // Ajusta estas coordenadas según sea necesario
        $this->Write(0, 'Centro de Análisis', '', 0, 'L', true);
        $this->SetXY(60, 20); // Ajusta estas coordenadas según sea necesario
        $this->Write(0, '0286-9523739 / 0414-0965858 ', '', 0, 'L', true);
        // Selecciona la fuente, el color y el fondo
        $this->SetFont('helvetica', 'I', 10);
        $this->SetTextColor(0, 0, 255);

        // Escribe el código
        $this->SetXY(150, 15);
        $this->Write(0, 'codEx: '. $this->codigo);

        // Cambia el color del texto para la fecha
        $this->SetTextColor(0, 0, 0);

        // Escribe la fecha
        $this->SetXY(150, 20);
        $this->Write(0, 'Fecha: '. $this->fecha);
        $this->Ln(1);
        $this->SetFont('helvetica', 'I', 10);
        $this->Write(0,'_________________________________________________________________________________________');
    }

    // Pie de página personalizado
    public function Footer() {
        $this->SetTextColor(0, 0, 0);
        $this->SetY(-25);
        $this->Cell(0, 10, '__________________________________________________________________________________________________________________', 0, 0, 'C');
        $this->Ln(5);
        $this->SetX(-110);
        $this->Cell(5, 10, 'Av.Atlantico, C.C. Plaza Atlantico,Locales PB 53- 54 (Al lado de Farmatodo) Pto Ordaz Edo. Bolivar', 0, false, 'C', 0, '', 0, false, 'T', 'M');

        // Posición a 15 mm del borde inferior
        $this->SetY(-15);
        // Establece la fuente
        $this->SetFont('helvetica', 'I', 8);
        // Color de texto en gris
        $this->SetTextColor(0, 0, 0);
        // Número de página
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // Añade más elementos al pie de página si es necesario
    }
}