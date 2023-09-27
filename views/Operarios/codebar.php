<?php
require('../../libs/pdf/fpdf.php');
include '../../libs/codebar/barcode.php';

//$codigo = $_POST['estndar'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $id;
	$id = 1;
    // Logo
     $this->Image('../../Imagenes/Cinvyc-logo.png',5,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
		$this->Ln(2);
    // Movernos a la derecha
    $this->Cell(30);
	 $this->Cell(40,10,utf8_decode('Codigo de barras'));

	 $this->Ln(13);
}
}



//momento de conectarnos a db
$conn = mysqli_connect("cinyciot.com", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");
$consulta = "SELECT * FROM `almacen`";
$resultado = $conn->query($consulta);

$pdf = new PDF('L', 'mm', array(101.6,127));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$pdf->SetAutoPageBreak(true, 20);

	while ($row = $resultado->fetch_assoc()){

		$barcodes = $row['alm_codebar'];
		$caract = $row['alm_carac'];
		$dato_fech = $row['alm_date'];
		$fetch = substr($dato_fech, 0,10);
		$dato_code = $row['alm_codigo'];

        $datos = $caract;
			  $code = $barcodes;
				$fecha = $fetch;
				$codigo = 	$dato_code;
					}

		$pdf->Cell(37);
		$pdf->Cell(40,10,utf8_decode($datos));
		$pdf->Ln(15);

		barcode('codigos/'.$code.'.png', $code, 80, 'horizontal', 'code128', true);

		$pdf->Image('codigos/'.$code.'.png',33,32,65,0,'PNG');


	  $pdf->Ln(23);
		$pdf->Cell(40);
		$pdf->SetFont('Arial','I',14);
		$pdf->Cell(40,10,utf8_decode($codigo));

	  $pdf->Ln(7);
	  $pdf->SetFont('Arial','I',10);
		$pdf->Cell(40,10,utf8_decode('Fecha:   '.$fetch ));

	$pdf->Output();
?>
