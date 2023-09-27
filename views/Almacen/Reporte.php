<?php
require('../../libs/pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $id;
	$id = 1;
    // Logo
     $this->Image('../../Imagenes/Cinvyc-logo.png',5,8,38);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(75);
    // Título
    $this->Cell(40,10,utf8_decode('Strok en almacen'));
		// Salto de línea
		$this->Ln(15);
		$this->SetFont('Arial','I',10);
		$this->Cell(40,10,utf8_decode('Muestra de reporte pdf. Todos los datos en este archivo vienen de la informacion guardada en almacen'));
    // Salto de línea
    $this->Ln(10);

  $this->SetFont('Arial','B',10);
   $this->SetFillColor (52,111,224);
   $this->SetTextColor (255,255,255);
   $this->Cell(10,10, 'id',1,0, 'C', true);
   $this->Cell(10,10, 'No',1,0, 'C', true);
   $this->Cell(30,10, 'Cliente',1,0, 'C', true);
   $this->Cell(35,10, 'Fecha',1,0, 'C', true);
   $this->Cell(25,10,  'Turno',1,0, 'C', true);
	 $this->Cell(35,10,  'Codigo',1,0, 'C', true);
	 $this->Cell(45,10,  'Codigo de barras',1,1, 'C', true);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',7);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//momento de conectarnos a db
$conn = mysqli_connect("cinyciot.com", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");
$consulta = "SELECT * FROM `almacen`";
$resultado = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

foreach ($resultado as $row) {

	$dato_fech = $row['alm_date'];
	$fecha = substr($dato_fech, 0,10);

  $pdf->SetFillColor (52,111,224);
  $pdf->SetTextColor (255,255,255);
  $pdf->Cell(10,10, $id,1,0, 'C', true);
  $pdf->SetTextColor (0,0,0);
	$pdf->Cell(10,10, $row['alm_numero'],1,0, 'C', 0);
	$pdf->Cell(30,10, $row['alm_cliente'],1,0, 'C', 0);
	$pdf->Cell(35,10, $fecha,1,0, 'C', 0);
	$pdf->Cell(25,10, $row['alm_turno'],1,0, 'C', 0);
	$pdf->Cell(35,10, $row['alm_codigo'],1,0, 'C', 0);
	$pdf->Cell(45,10, $row['alm_codebar'],1,1, 'C', 0);
	$id ++;
}
$pdf->Output();
?>
