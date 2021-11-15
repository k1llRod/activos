<?php
require_once '../../models/conexion.php';
require_once '../../controllers/assignment.php';
require_once '../../controllers/employee.php';
require_once '../../models/assignment.php';
require_once '../../models/employee.php';
require_once('tcpdf_include.php');

class MYPDF extends TCPDF {
    //Page header

    public function Header() {
        $this->SetY(15);
        // Logo
        $image_file = K_PATH_IMAGES.'logo_ine.jpg';
        $this->Image($image_file, 20, 15, 20, '', 'JPG', '', 'T', 0, 700, 1, false, false,0, false, false, true);
        $this->SetFont('helvetica', 'N', 9);
        $this->Cell(50, 5, '', 0, 0, 'C', 0, 0, 0, 0, 'T', 'C');
        $this->Cell(45, 5, '', 0, 0, 'C', 0, 0, 0, 0, 'T', 'C');
        #$this->SetFont('helvetica', 'C', 7);
        $this->Cell(55, 5, 'FAF - 002', 0, 1, 'C', 0, 0, 0, 0, 'T', 'C');
        $this->SetX(40);
        $this->SetFont('helvetica', 'N', 9);
        $this->Cell(50, 5, '', 0, 0, 'C', 0, 0, 0, 0, 'T', 'C');
        $this->Cell(45, 5, '', 0, 0, 'C', 0, 0, 0, 0, 'T', 'C');
        #$this->SetFont('helvetica', 'BU', 7);
        $this->Cell(55, 5, 'INE-AF-AA-N: 0727/2021', 0, 1, 'C', 0, 0, 0, 0, 'T', 'C');
     
        $this->SetX(40);
        $this->SetFont('helvetica', 'N', 7);
        $this->Multicell(50, 10, '', 0, 'C', 0, '');
        $this->Cell(45, 5, '', 0, 1, 'C', 0, 0, 0, 0, 'T', 'C');
        $this->SetX(90);
        $this->Cell(45, 5, '', 0, 0, 'C', 0, 0, 0, 0, 'T', 'C');
        $this->SetXY(135,25);
        $this->Multicell(55, 10, '', 0, 'C', 0, '');
        
        
        #$this->Cell(45, 5, 'Unidad ejecutora', 1, 1, 'C', 0, 0, 0, 0, 'T', 'T');
        // Set font
      
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF('P', 'mm', 'letter', true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Oliver Calle');
$pdf->SetTitle('Actas y documentos');
$pdf->SetSubject('Actas y documentos PDF');
$pdf->SetKeywords('PDF, PDF, auto inicial, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$a = new assignmentController();
$b = $a -> tabla_asignacion();

// ---------------------------------------------------------

// add a page
$PDF_MARGIN_LEFT = 25;
$PDF_MARGIN_TOP = 45;
$PDF_MARGIN_RIGHT = 25;
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);

$pdf->AddPage();
#$respuesta = cadetesControlador::impresion_acta_pdf();
// set some text to print
#foreach ($respuesta as $row => $item) {
	# code...
$funcionario = employeeController::data_employee();
foreach($funcionario as $row => $item){
    $id_funcionario = $item['id_funcionario'];
    $nombre_completo = $item['nombres'].' '.$item['apellidos'];
    $cargo =$item['cargo'];
    $estado = $item['estado'];
    $dependencia = $item['dependencia'];
}

$html1 = <<<EOF
<div style="margin-top:20px;" >
    <table  style="font-size:11px; text-transform: uppercase;">
        <tr>
            <td width="100%" colspan="4" style="text-align:center; font-family:Monotype Corsiva; font-size:14px; height: 30px;"><strong>Acta de Asignación</strong></td>
        </tr>
        <tr>
            <td width="100%" colspan="4" style="text-align:justify;">En la ciudad de La Paz, en fecha [fecha de entrega], el Área de Activos Fijos de la Unidad de Servicios Administrativos dependiente de
            la Dirección de Administración y Servicios del Instituto Nacional de Estadística, realiza la ENTREGA de los bienes de uso al Sr.(a):
             $nombre_completo $cargo $dependencia, de acuerdo al siguiente detalle:</td>
            
        </tr>
    </table>
</div>
EOF;

// print a block of text using Write()
$pdf->writeHTML($html1, false, false, false, false, '');

$html3 = <<<EOF
	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666; width:25px; vertical-align: middle;">Nro</td>
			<td style="border: 1px solid #666; width: 70px;">Unidad</td>
            <td style="border: 1px solid #666;">Código</td>
            <td style="border: 1px solid #666; width:200px;">Descripción</td>
            <td style="border: 1px solid #666;">Serie</td>
            <td style="border: 1px solid #666; vertical-align: middle;">Estado</td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($html3, false, false, false, false, ''); 

$c = "<div>".$b."</div>" ;

$html2 = <<<EOF
    $c
EOF;
$pdf->writeHTML($html2, false, false, false, false, '');

$html4 = <<<EOF
    <table style="font-size:10px">
        <tr>
            <td>Certificando lo registrado en este documento firmamos:</td>
        </tr>
    </table>
	<table style="border: 1px solid gray; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666; background-color: rgb(177, 177, 177);">Recibí Conforme:</td>
			<td style="border: 1px solid #666; background-color: rgb(177, 177, 177);">Entregue Conforme:</td>
            <td style="border: 1px solid #666; background-color: rgb(177, 177, 177);">Autorizado Por:</td>
		</tr>
        <tr>
			<td style="border: 1px solid #666; height: 140px;"></td>
			<td style="border: 1px solid #666; height: 140px;"></td>
            <td style="border: 1px solid #666; height: 140px;"></td>
		</tr>
	</table>
    <table  style="line-height: 20px; margin: 50px;"> 
        <tr>
            <td style="text-align: center; font-size: 8px; height: 15px; vertical-align: middle;"><strong>PROHIBICIONES PARA LOS SERVIDORES PÚBLICOS S/ D.S. N°0181 NB-SABS, de fecha 28 de junio de 2009</strong></td>
        </tr>
        <tr>
            <td style="text-align: justify; font-size: 8px; height: 25px; vertical-align: middle;">Los servidores públicos quedan prohibidos de: a) Usar los bienes para beneficio particular o privado; b)Permitir el uso para beneficio particular o privado; c) Prestar o transferir el bien
            a otro empleado público; d) Enajenar el bien por cuenta propia; e) Poner en riesgo el bien; f) Ingresar bienes particulares sin autorización del área o Responsable de Activos Fijos; g)
            Sacar bienes de la entidad sin autorización del área o Responsable de Activos Fijos; h) Quitar el sticker de identificación del activo fijo y i) Dañar o alterar sus características físicas o
            técnicas. ASI MISMO LA ENTREGA DEL BIEN SE REALIZARA DE ACUERDO A EL ART. 147 Y 148 DEL D.S 181 Mientras no lo haga, estará sujeto al régimen de
            Responsabilidad por la Función Pública establecida en la Ley N° 1178 y sus reglamentos</td>
        </tr>
    </table>

EOF;
$pdf->writeHTML($html4, false, false, false, false, '');
var_dump(array("data"=>"demo"));
ob_end_clean();
// ---------------------------------------------------------
#}
//Close and output PDF document
$pdf->Output('acta.pdf');

//============================================================+
// END OF FILE
//============================================================+

?>