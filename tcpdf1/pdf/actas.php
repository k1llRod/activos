<?php
require_once '../../modelo/conexion.php';
require_once '../../controlador/cadetes.php';
require_once '../../modelo/cadetes.php';

// Extend the TCPDF class to create custom Header and Footer
require_once('tcpdf_include.php');

class MYPDF extends TCPDF {
    //Page header

    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_policia.png';
        $this->Image($image_file, 40, 10, 15, '', 'PNG', '', 'T', 1, 700, 1, false, false,0, false, false, true);
        $this->Cell(70, 15, ' ', 0, 0, 'C', 0, 0, 0, 0, 'T', 'T');
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(60, 15, 'Comisión de Régimen Disciplinario ANAPOL', 0, 1, 'C', 0, 0, 0, 0, 'T', 'C');

        $this->SetFont('helvetica', 'C', 7);
        $this->Cell(45, 3, 'POLICÍA BOLIVIANA', 0, 1, 'C', 0, 0, 0, 0, 'T', 'T');
        
        $this->Cell(45, 3, 'FACULTAD DE CIENCIAS POLICIALES', 0, 1, 'C', 0, 0, 0, 0, 'T', 'T');
        $this->Cell(45, 3, 'ACADEMIA NACIONAL DE POLICÍAS', 0, 1, 'C', 0, 0, 0, 0, 'T', 'T');
        $this->SetFont('helvetica', 'BU', 7);
        $this->Cell(45, 3, 'La Paz – Bolivia', 0, 0, 'C', 0, 0, 0, 0, 'T', 'T');
        
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

// ---------------------------------------------------------

// add a page
$PDF_MARGIN_LEFT = 25;
$PDF_MARGIN_TOP = 45;
$PDF_MARGIN_RIGHT = 25;
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);

$pdf->AddPage();
$respuesta = cadetesControlador::impresion_acta_pdf();
// set some text to print
foreach ($respuesta as $row => $item) {
	# code...

$html1 = <<<EOF

	
	<div style="font-size:8px; text-align:justify;">
	$item[editar_descripcion]
	</div>	


EOF;

// print a block of text using Write()
$pdf->writeHTML($html1, false, false, false, false, '');


// ---------------------------------------------------------
}
//Close and output PDF document
$pdf->Output('acta.pdf');

//============================================================+
// END OF FILE
//============================================================+