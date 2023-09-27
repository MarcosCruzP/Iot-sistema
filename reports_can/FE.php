<?php
require('../libs/pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $id;

    // Logo
     $this->Image('../Imagenes/logo_can.jpg',5,8,15);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
		// Salto de línea
		$this->Ln(4);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(35,10,utf8_decode('Formacion espiritual'));

    // Salto de línea
    $this->Ln(16);
}

// Pie de página
function Footer()
{
  // Posición: a 1,5 cm del final
 $this->SetY(-15);
 // Arial italic 8
 $this->SetFont('Arial','I',8);
 // Número de página
 $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$conn = mysqli_connect("canmx.com", "viajesb3_admin_can", "31081997mcp", "viajesb3_can_web");
$result = $conn->query("SELECT * FROM `FE_inscrip` ");
$almacen = $result->fetch_all(MYSQLI_ASSOC);


$pdf = new PDF(); //use new class
$pdf->AliasNbPages();
$pdf->AddPage();



    $pdf->ln(2);
    $pdf->SetFont('Arial','',7);
    $pdf->SetFillColor (255, 0, 0 );
    $pdf->SetTextColor (255,255,255);
    $pdf->Cell(55,5,Nombre,1,0, 'C', true);
    $pdf->Cell(50,5,email,1,0, 'C', true);
    $pdf->Cell(20,5,movil,1,0, 'C', true);
    $pdf->Cell(30,5,horario,1,0, 'C', true);
    $pdf->Cell(20,5,nivel,1,0, 'C', true);
    $pdf->Cell(20,5,estado,1,1, 'C', true);


    $pdf->SetFillColor (255,255,255);
    $pdf->SetTextColor (0,0,0);


 foreach ($almacen as $row2 ) {

     $pdf->Cell(55,6,utf8_decode($row2['fe_name']),1,0, 'C', true);
     $pdf->Cell(50,6,utf8_decode($row2['fe_email']),1,0, 'C', 0);
     $pdf->Cell(20,6,utf8_decode($row2['fe_movil']),1,0, 'C', 0);
     $pdf->Cell(30,6,utf8_decode($row2['fe_horario']),1,0, 'C', 0);
     $pdf->Cell(20,6,$row2['fe_nivel'],1,0, 'C', 0);
     $pdf->Cell(20,6,$row2['fe_tipo'],1,1, 'C', 0);




}
$pdf->Output();
?>
