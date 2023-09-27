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
    $this->Cell(35,10,utf8_decode('Testimonios'));

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
$result = $conn->query("SELECT * FROM `testimonio` ");
$almacen = $result->fetch_all(MYSQLI_ASSOC);


$pdf = new PDF(); //use new class
$pdf->AliasNbPages();
$pdf->AddPage('H');



    $pdf->ln(2);
    $pdf->SetFont('Arial','',7);
    $pdf->SetFillColor (255, 0, 0 );
    $pdf->SetTextColor (255,255,255);
    $pdf->Cell(50,5,Nombre,1,0, 'C', true);
    $pdf->Cell(50,5,Nombre,1,0, 'C', true);
    $pdf->Cell(180,5,Testimonio,1,1, 'C', true);

    $pdf->SetFillColor (255,255,255);
    $pdf->SetTextColor (0,0,0);


 foreach ($almacen as $row2 ) {
     $peticiones = strlen ($row2['testi_test']);


   if ($peticiones <= 150) {
     $pdf->Cell(50,6,utf8_decode($row2['name1_test']),1,0, 'C', true);
     $pdf->Cell(50,6,utf8_decode($row2['name2_test']),1,0, 'C', 0);
     $pdf->Cell(180,6,utf8_decode($row2['testi_test']),1,1, 'C', 0);

   }elseif ($peticiones > 150 ) {
     $can_recort = $peticiones - 140;
      $peti1= substr($row2['testi_test'], 0, -$can_recort) . "\n";
      $can_recort2 = $peticiones - 280;
      $peti2= substr($row2['testi_test'],140, -$can_recort2) . "\n";
      $peti3= substr($row2['testi_test'],280);




      $pdf->Cell(50,12,utf8_decode($row2['name1_test']),1,0, 'C', true);
      $pdf->Cell(50,12,utf8_decode($row2['name2_test']),1,0, 'C', 0);
      $pdf->Cell(180,4,utf8_decode($peti1),'LTR',2, 'C', 0);
      $pdf->Cell(180,4,utf8_decode($peti2),'LR',2, 'C', 0);
      $pdf->Cell(180,4,utf8_decode($peti3),'LRB',0, 'C', 0);
      $pdf->ln();
   }



}
$pdf->Output();
?>
