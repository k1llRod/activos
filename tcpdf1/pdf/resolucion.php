<?php
require_once '../../modelo/conexion.php';
require_once '../../controlador/cadetes.php';
require_once '../../modelo/cadetes.php';

// Extend the TCPDF class to create custom Header and Footer
require_once('tcpdf_include.php');

class MYPDF extends TCPDF {
    //Page header

    public function Header() {
        
      
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(100, 10, ' Continúa la Res. Adm.  Nº 013/2018-NR  Comisión de Régimen Disciplinario ANAPOL   ', 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->Cell(70, 10,$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

    }
}

// create new PDF document
$pdf = new MYPDF('P', 'mm', 'letter', true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Oliver Calle');
$pdf->SetTitle('Resolucion');
$pdf->SetSubject('Resolucion PDF');
$pdf->SetKeywords('PDF, PDF, Resolucion, test, guide');

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
$PDF_MARGIN_TOP = 25;
$PDF_MARGIN_RIGHT = 25;
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);

$pdf->AddPage();
$respuesta = cadetesControlador::impresion_resolucion_pdf();
// set some text to print
foreach ($respuesta as $row => $item) {
	# code...

$html1 = <<<EOF

	<div style="margin-top:1px;">

		<table  style="font-size:11px; text-transform: uppercase;">
			<tr>
				<td width="25%"></td>
				<td width="50%" style="text-align:center; font-family:Monotype Corsiva; "><img src="images/logo_policia_resolucion.png" alt=""></td>
				<td width="25%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva;"><strong>POLICÍA BOLIVIANA</strong></td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva;">DIRECCIÓN NACIONAL DE INSTRUCCIÓN Y ENSEÑANZA</td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva;">UNIVERSIDAD POLICIAL “Mcal. ANTONIO JOSE DE SUCRE”</td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva;"><strong>ACADEMIA NACIONAL DE POLICÍAS</strong></td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva; "><strong style="text-transform: uppercase;"></strong></td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva; "><strong style="text-transform: uppercase;">COMISIÓN DE REGIMEN DISCIPLINARIO</strong></td>
				<td width="20%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva; "><strong style="text-transform: uppercase;">RESOLUCIÓN ADMINISTRATIVA Nº $item[id_sancion]/$item[id_cadete]</strong></td>
				<td width="20%"></td>
			</tr>

			<tr>
				<td width="15%"></td>
				<td width="70%" style="text-align:center; font-family:Monotype Corsiva; "><strong style="text-transform: uppercase;">PROCEDIMIENTO INMEDIATO EN FALTAS DISCIPLINARIAS GRAVES</strong></td>
				<td width="15%"></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="60%" style="text-align:center; font-family:Monotype Corsiva; "><strong style="text-transform: uppercase;">LA PAZ (SEGÜENCOMA), $item[fecha_registro]</strong></td>
				<td width="20%"></td>
			</tr>
			

		</table>
		
		
		
	</div>

	

	<div style="font-size:8px; text-align:justify;">
	$item[resolucion_disciplinaria]
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