<?php
require('../libs/pdf/fpdf.php');
	$id = 1;

$semana = 40;

if (isset($_POST['seman']) ) {
	$semana = $_POST['seman'];

}


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
    $this->Cell(35,10,utf8_decode('Asistencias online'));

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
$code = "TurnoA";
$fecha = date("Y-m-d");


$darn_h1=0;
$darn_h2=0;
$darn_h3=0;

$darat_h1 =0;
$darat_h2 =0;
$darat_h2 =0;

$darate_h1=0;
$darate_h2=0;
$darate_h3=0;

$daratol_h1 =0;
$daratol_h2 =0;
$daratol_h3 =0;

$daratul_h1=0;
$daratul_h2=0;
$daratul_h3=0;

$conn = mysqli_connect("canmx.com", "viajesb3_admin_can", "31081997mcp", "viajesb3_can_web");
$result = $conn->query("SELECT * FROM `asistencias` ");
$almacen = $result->fetch_all(MYSQLI_ASSOC);

$count = count($almacen);

foreach ($almacen as $row) {
  $ef1 = $row['asis_sede'];
  if ($ef1=="Naucalpan") {
    $asis1 = $row['asis_horario'];
       if ($asis1=="10:00") {
           $darn_h1++;
       }
       if ($asis1=="12:00") {
           $darn_h2++;
       }
       if ($asis1=="7:00") {
           $darn_h3++;
       }
  }

  if ($ef1=="Atlacomulco") {
    $asis2 = $row['asis_horario'];
       if ($asis2=="10:00") {
           $darat_h1++;
       }
       if ($asis2=="12:00") {
           $darat_h2++;
       }
       if ($asis2=="7:00") {
           $darat_h3++;
       }
  }

  if ($ef1=="Tesoro") {
    $asis3 = $row['asis_horario'];
       if ($asis3=="10:00") {
           $darate_h1++;
       }
       if ($asis3=="12:00") {
           $darate_h2++;
       }
       if ($asis3=="7:00") {
           $darate_h3++;
       }
  }

  if ($ef1=="Toluca") {
    $asis4 = $row['asis_horario'];
       if ($asis4=="10:00") {
           $daratol_h1++;
       }
       if ($asis4=="12:00") {
           $daratol_h2++;
       }
       if ($asis4=="7:00") {
           $daratol_h3++;
       }
  }

  if ($ef1=="Tultitlan") {
    $asis5 = $row['asis_horario'];
       if ($asis5=="10:00") {
           $daratul_h1++;
       }
       if ($asis5=="12:00") {
           $daratul_h2++;
       }
       if ($asis5=="7:00") {
           $daratul_h3++;
       }
  }

}

$total_nauc= $darn_h1+$darn_h2+$darn_h3;
$total_atlac= $darat_h1+$darat_h2+$darat_h3;
$total_tes = $darate_h1+$darate_h2+$darate_h3;
$total_tol = $daratol_h1+$daratol_h2+$daratol_h3;
$total_tulti = $daratul_h1+$daratul_h2+$daratul_h3;

$toal_asist= $total_atlac + $total_nauc +$total_tes +$total_tol +$total_tulti;

$pdf = new PDF(); //use new class
$pdf->AliasNbPages();
$pdf->AddPage();

	 $pdf->SetFont('Arial','',7);
   $pdf->SetFillColor (255, 0, 0 );
   $pdf->SetTextColor (255,255,255);
	 $pdf->Cell(5);
   $pdf->Cell(35,5,Sede,1,0, 'C', true);
   $pdf->Cell(35,5,'10:00am' ,1,0, 'C', true);
	 $pdf->Cell(35,5,'12:00pm',1,0, 'C', true);
   $pdf->Cell(35,5,'7:00pm' ,1,0, 'C', true);
	 $pdf->Cell(35,5,Total,1,1, 'C', true);

	 $pdf->SetFillColor (255,255,255);
   $pdf->SetTextColor (0,0,0);
	 $pdf->Cell(5);
	 $pdf->Cell(35,6,'Naucalpan',1,0, 'C', true);
   $pdf->Cell(35,6,$darn_h1,1,0, 'C', 0);
	 $pdf->Cell(35,6,$darn_h2,1,0, 'C', 0);
	 $pdf->Cell(35,6,$darn_h3,1,0, 'C', 0);
 	$pdf->Cell(35,6,$total_nauc,1,1, 'C', 0);

	 $pdf->SetFillColor (255,255,255);
	 $pdf->SetTextColor (0,0,0);
	 $pdf->Cell(5);
	$pdf->Cell(35,6,'Atlacomulco',1,0, 'C', true);
	 $pdf->Cell(35,6,$darat_h1,1,0, 'C', 0);
	$pdf->Cell(35,6,$darat_h2,1,0, 'C', 0);
	$pdf->Cell(35,6,$darat_h3,1,0, 'C', 0);
	$pdf->Cell(35,6,$total_atlac,1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(35,6,'Tesoro',1,0, 'C', true);
	$pdf->Cell(35,6,$darate_h1,1,0, 'C', 0);
	$pdf->Cell(35,6,$darate_h2,1,0, 'C', 0);
	$pdf->Cell(35,6,$darate_h3,1,0, 'C', 0);
	$pdf->Cell(35,6,$total_tes,1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(35,6,'Toluca',1,0, 'C', true);
	$pdf->Cell(35,6,$daratol_h1,1,0, 'C', 0);
	$pdf->Cell(35,6,$daratol_h2,1,0, 'C', 0);
	$pdf->Cell(35,6,$daratol_h3,1,0, 'C', 0);
	$pdf->Cell(35,6,$total_tol,1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(35,6,'Tultitlan',1,0, 'C', true);
	$pdf->Cell(35,6,$daratul_h1,1,0, 'C', 0);
	$pdf->Cell(35,6,$daratul_h2,1,0, 'C', 0);
	$pdf->Cell(35,6,$daratul_h3,1,0, 'C', 0);
	$pdf->Cell(35,6,$total_tulti,1,1, 'C', 0);

 $pdf->Cell(145);
 	$pdf->Cell(35,6,$toal_asist,1,1, 'C', 0);

  //position
  $chartX=20;
  $chartY=76;

  $chartWidth=175;
  $chartHeight=70;

  //padding
  $chartTopPadding=10;
  $chartLeftPadding=15;
  $chartBottomPadding=10;
  $chartRightPadding=5;

  //chart box
  $chartBoxX=$chartX+$chartLeftPadding;
  $chartBoxY=$chartY+$chartTopPadding;
  $chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
  $chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

  //bar width
  $barWidth=10;


  //chart data
  $data=Array(
  	'Naucalpan'=>[
  		'color'=>[255, 0, 0 ],
  		'value'=>$total_nauc],
  	'Atlacomulco'=>[
  		'color'=>[255, 0, 0 ],
  		'value'=>$total_atlac],
  	'Tesoro'=>[
  		'color'=>[255, 0, 0 ],
  		'value'=>$total_tes],
  	'Toluca'=>[
  		'color'=>[255, 0, 0 ],
  		'value'=>$total_tol],
  	'Tultitlan'=>[
  		'color'=>[255, 0, 0 ],
  		'value'=>$total_tulti]
  	);

    //$dataMax
    $dataMax=0;
    foreach($data as $item){
    	if($item['value']>$dataMax)$dataMax=$total_nauc+5;
    }

    //data step
    $dataStep=5;

    //set font, line width and color
    $pdf->SetFont('Arial','',8);
    $pdf->SetLineWidth(0.005);
    $pdf->SetDrawColor(0);

    //chart boundary
    $pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

    //horizontal axis line
    $pdf->Line(
    	$chartBoxX-2 ,
    	($chartBoxY+$chartBoxHeight) ,
    	$chartBoxX+($chartBoxWidth) ,
    	($chartBoxY+$chartBoxHeight)
    	);

    ///vertical axis
    //calculate chart's y axis scale unit
    $yAxisUnits=$chartBoxHeight/$dataMax;

    //draw the vertical (y) axis labels
    for($i=0 ; $i<=$dataMax ; $i+=$dataStep){
    	//y position
    	$yAxisPos=$chartBoxY+($yAxisUnits*$i);
    	//draw y axis line
      $pdf->Line(
      $chartBoxX-2 ,
      $yAxisPos,
      $chartBoxX+($chartBoxWidth) ,
      $yAxisPos
      );
    	//set cell position for y axis labels
    	$pdf->SetXY($chartBoxX-$chartLeftPadding , $yAxisPos-2);
    	//$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);---------------
    	$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i, 0 , 0 , 'R');
    }

    ///horizontal axis
    //set cells position
    $pdf->SetXY($chartBoxX , $chartBoxY+$chartBoxHeight);

  //cell's width
  $xLabelWidth=$chartBoxWidth / count($data);

  //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
  //loop horizontal axis and draw the bar
  $barXPos=0;
  foreach($data as $itemName=>$item){
  	//print the label
  	//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');--------------
  	$pdf->Cell($xLabelWidth , 5 , $itemName , 0 , 0 , 'C');

  	///drawing the bar
  	//bar color
  	$pdf->SetFillColor($item['color'][0],$item['color'][1],$item['color'][2]);
  	//bar height
  	$barHeight=$yAxisUnits*$item['value'];
  	//bar x position
  	$barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
  	$barX=$barX-($barWidth/2);
  	$barX=$barX+$chartBoxX;
  	//bar y position
  	$barY=$chartBoxHeight-$barHeight;
  	$barY=$barY+$chartBoxY;
  	//draw the bar
  	$pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');
  	//increase x position (next series)
  	$barXPos++;
  }
  //axis labels
  $pdf->SetFont('Arial','B',10);
  $pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY);

//  $pdf->Cell(100,10,"% EFICIENCIA POR MAQUINA TURNO A",0,0,'C');

$total_h1= $darn_h1+ $darat_h1+ $darate_h1+$daratol_h1+$daratul_h1;
$total_h2= $darn_h2+ $darat_h2+ $darate_h2+$daratol_h2+$daratul_h2;
$total_h3= $darn_h3+ $darat_h3+ $darate_h3+$daratol_h3+$daratul_h2;

    $pdf->ln(79);
  	 $pdf->SetFont('Arial','',7);
     $pdf->SetFillColor (255, 0, 0 );
     $pdf->SetTextColor (255,255,255);
  	 $pdf->Cell(5);
     $pdf->Cell(26,5,Horario,1,0, 'C', true);
     $pdf->Cell(26,5,'Naucalpan' ,1,0, 'C', true);
  	 $pdf->Cell(26,5,'Atlacomulco',1,0, 'C', true);
     $pdf->Cell(26,5,'Tesoro' ,1,0, 'C', true);
  	 $pdf->Cell(26,5,Toluca,1,0, 'C', true);
     $pdf->Cell(26,5,Tultitlan,1,0, 'C', true);
     $pdf->Cell(26,5,Total,1,1, 'C', true);

  	 $pdf->SetFillColor (255,255,255);
     $pdf->SetTextColor (0,0,0);
  	 $pdf->Cell(5);
  	 $pdf->Cell(26,6,'10:00am',1,0, 'C', true);
     $pdf->Cell(26,6,$darn_h1,1,0, 'C', 0);
  	 $pdf->Cell(26,6,$darat_h1,1,0, 'C', 0);
  	 $pdf->Cell(26,6,$darate_h1,1,0, 'C', 0);
     $pdf->Cell(26,6,$daratol_h1,1,0, 'C', 0);
     $pdf->Cell(26,6,$daratul_h1,1,0, 'C', 0);
   	$pdf->Cell(26,6,$total_h1,1,1, 'C', 0);

  	 $pdf->SetFillColor (255,255,255);
  	 $pdf->SetTextColor (0,0,0);
  	 $pdf->Cell(5);
  	$pdf->Cell(26,6,'12:00pm',1,0, 'C', true);
    $pdf->Cell(26,6,$darn_h2,1,0, 'C', 0);
    $pdf->Cell(26,6,$darat_h2,1,0, 'C', 0);
    $pdf->Cell(26,6,$darate_h2,1,0, 'C', 0);
    $pdf->Cell(26,6,$daratol_h2,1,0, 'C', 0);
    $pdf->Cell(26,6,$daratul_h2,1,0, 'C', 0);
   $pdf->Cell(26,6,$total_h2,1,1, 'C', 0);

  	$pdf->Cell(5);
  	$pdf->Cell(26,6,'7:00pm',1,0, 'C', true);
    $pdf->Cell(26,6,$darn_h3,1,0, 'C', 0);
    $pdf->Cell(26,6,$darat_h3,1,0, 'C', 0);
    $pdf->Cell(26,6,$darate_h3,1,0, 'C', 0);
    $pdf->Cell(26,6,$daratol_h3,1,0, 'C', 0);
    $pdf->Cell(26,6,$daratul_h3,1,0, 'C', 0);
    $pdf->Cell(26,6,$total_h3,1,1, 'C', 0);



   $pdf->Cell(161);
   	$pdf->Cell(26,6,$toal_asist,1,1, 'C', 0);

    //position
    $chartX=20;
    $chartY=190;

    //dimension
    $chartWidth=175;
    $chartHeight=70;

    //padding
    $chartTopPadding=10;
    $chartLeftPadding=15;
    $chartBottomPadding=10;
    $chartRightPadding=5;

    //chart box
    $chartBoxX=$chartX+$chartLeftPadding;
    $chartBoxY=$chartY+$chartTopPadding;
    $chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
    $chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

    //bar width
    $barWidth=20;


    //chart data
    $data=Array(
    	'10:00 am'=>[
    		'color'=>[255, 0, 0 ],
    		'value'=>$total_h1],
    	'12:00 pm'=>[
    		'color'=>[255, 0, 0 ],
    		'value'=>$total_h2],
    	'7:00 pm'=>[
    		'color'=>[255, 0, 0 ],
    		'value'=>$total_h3]
    	);

      //$dataMax
      $dataMax=0;
      foreach($data as $item){
      	if($item['value']>$dataMax)$dataMax=$total_h1+5;
      }

      //data step
      $dataStep=10;

      //set font, line width and color
      $pdf->SetFont('Arial','',8);
      $pdf->SetLineWidth(0.005);
      $pdf->SetDrawColor(0);

      //chart boundary
      $pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

      //horizontal axis line
      $pdf->Line(
      	$chartBoxX-2 ,
      	($chartBoxY+$chartBoxHeight) ,
      	$chartBoxX+($chartBoxWidth) ,
      	($chartBoxY+$chartBoxHeight)
      	);

      ///vertical axis
      //calculate chart's y axis scale unit
      $yAxisUnits=$chartBoxHeight/$dataMax;

      //draw the vertical (y) axis labels
      for($i=0 ; $i<=$dataMax ; $i+=$dataStep){
      	//y position
      	$yAxisPos=$chartBoxY+($yAxisUnits*$i);
      	//draw y axis line
        $pdf->Line(
        $chartBoxX-2 ,
        $yAxisPos,
        $chartBoxX+($chartBoxWidth) ,
        $yAxisPos
        );
      	//set cell position for y axis labels
      	$pdf->SetXY($chartBoxX-$chartLeftPadding , $yAxisPos-2);
      	//$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);---------------
      	$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i, 0 , 0 , 'R');
      }

      ///horizontal axis
      //set cells position
      $pdf->SetXY($chartBoxX , $chartBoxY+$chartBoxHeight);

    //cell's width
    $xLabelWidth=$chartBoxWidth / count($data);

    //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
    //loop horizontal axis and draw the bar
    $barXPos=0;
    foreach($data as $itemName=>$item){
    	//print the label
    	//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');--------------
    	$pdf->Cell($xLabelWidth , 5 , $itemName , 0 , 0 , 'C');

    	///drawing the bar
    	//bar color
    	$pdf->SetFillColor($item['color'][0],$item['color'][1],$item['color'][2]);
    	//bar height
    	$barHeight=$yAxisUnits*$item['value'];
    	//bar x position
    	$barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
    	$barX=$barX-($barWidth/2);
    	$barX=$barX+$chartBoxX;
    	//bar y position
    	$barY=$chartBoxHeight-$barHeight;
    	$barY=$barY+$chartBoxY;
    	//draw the bar
    	$pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');
    	//increase x position (next series)
    	$barXPos++;
    }
    //axis labels
    $pdf->SetFont('Arial','B',10);
    $pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $pdf->AddPage('H');

    $pdf->ln(2);
    $pdf->SetFont('Arial','',7);
    $pdf->SetFillColor (255, 0, 0 );
    $pdf->SetTextColor (255,255,255);
    $pdf->Cell(2);
    $pdf->Cell(50,5,Anfitrion,1,0, 'C', true);
    $pdf->Cell(6,5,A,1,0, 'C', true);
    $pdf->Cell(6,5,B,1,0, 'C', true);
    $pdf->Cell(6,5,K,1,0, 'C', true);
    $pdf->Cell(6,5,Y ,1,0, 'C', true);
    $pdf->Cell(6,5,W,1,0, 'C', true);
    $pdf->Cell(6,5,L,1,0, 'C', true);
    $pdf->Cell(155,5,Adultos,1,0, 'C', true);
    $pdf->Cell(20,5,Sede,1,0, 'C', true);
    $pdf->Cell(20,5,Horarios,1,1, 'C', true);

    $pdf->SetFillColor (255,255,255);
    $pdf->SetTextColor (0,0,0);


 foreach ($almacen as $row2 ) {
   $cant_afdult = strlen ($row2['asis_adultos']);




   if ($cant_afdult>=140 && $cant_afdult<=280) {
     $can_recort = $cant_afdult - 140;
     $adultp1= substr($row2['asis_adultos'], 0, -$can_recort) . "\n";
     $adultp2= substr($row2['asis_adultos'], 140);


     $pdf->Cell(2);
     $pdf->Cell(50,8,utf8_decode($row2['aist_name']),1,0, 'C', true);
     $pdf->Cell(6,8,utf8_decode($row2['asist_adutos']),1,0, 'C', 0);
     $pdf->Cell(6,8,utf8_decode($row2['asis_babies']),1,0, 'C', 0);
     $pdf->Cell(6,8,utf8_decode($row2['asis_kids']),1,0, 'C', 0);
     $pdf->Cell(6,8,utf8_decode($row2['asis_youth']),1,0, 'C', 0);
     $pdf->Cell(6,8,utf8_decode($row2['asis_wave']),1,0, 'C', 0);
     $pdf->Cell(6,8,utf8_decode($row2['asis_legcy']),1,0, 'C', 0);
     $pdf->Cell(155,4,utf8_decode($adultp1),'LTR',2, 'C', 0);
     $pdf->Cell(155,4,utf8_decode($adultp2),'LRB',0, 'C', 0);
     $pdf->ln(-4);
     $pdf->Cell(243);
     $pdf->Cell(20,8,utf8_decode($row2['asis_sede']),1,0, 'C', 0);
     $pdf->Cell(20,8,utf8_decode($row2['asis_horario']),1,1, 'C', 0);

   }elseif ($cant_afdult>=281) {
     $can_recort1 = $cant_afdult - 140;
     $adultp1a= substr($row2['asis_adultos'], 0, -$can_recort1) . "\n";
     $can_recort2 = $cant_afdult - 280;
     $adultp2a= substr($row2['asis_adultos'], 140, -$can_recort2);
     $adultp3a= substr($row2['asis_adultos'], 280);


     $pdf->Cell(2);
     $pdf->Cell(50,12,utf8_decode($row2['aist_name']),1,0, 'C', true);
     $pdf->Cell(6,12,utf8_decode($row2['asist_adutos']),1,0, 'C', 0);
     $pdf->Cell(6,12,utf8_decode($row2['asis_babies']),1,0, 'C', 0);
     $pdf->Cell(6,12,utf8_decode($row2['asis_kids']),1,0, 'C', 0);
     $pdf->Cell(6,12,utf8_decode($row2['asis_youth']),1,0, 'C', 0);
     $pdf->Cell(6,12,utf8_decode($row2['asis_wave']),1,0, 'C', 0);
     $pdf->Cell(6,12,utf8_decode($row2['asis_legcy']),1,0, 'C', 0);
     $pdf->Cell(155,4,utf8_decode($adultp1a),'LTR',2, 'C', 0);
     $pdf->Cell(155,4,utf8_decode($adultp2a),'LR',2, 'C', 0);
     $pdf->Cell(155,4,utf8_decode($adultp3a),'LRB',0, 'C', 0);
     $pdf->ln(-8);
     $pdf->Cell(243);
     $pdf->Cell(20,12,utf8_decode($row2['asis_sede']),1,0, 'C', 0);
     $pdf->Cell(20,12,utf8_decode($row2['asis_horario']),1,1, 'C', 0);

   }
   else{
     $pdf->Cell(2);
     $pdf->Cell(50,6,utf8_decode($row2['aist_name']),1,0, 'C', true);
     $pdf->Cell(6,6,utf8_decode($row2['asist_adutos']),1,0, 'C', 0);
     $pdf->Cell(6,6,$row2['asis_babies'],1,0, 'C', 0);
     $pdf->Cell(6,6,$row2['asis_kids'],1,0, 'C', 0);
     $pdf->Cell(6,6,$row2['asis_youth'],1,0, 'C', 0);
     $pdf->Cell(6,6,$row2['asis_wave'],1,0, 'C', 0);
     $pdf->Cell(6,6,$row2['asis_legcy'],1,0, 'C', 0);
     $pdf->Cell(155,6,utf8_decode($row2['asis_adultos']),1,0, 'C', 0);
     $pdf->Cell(20,6,utf8_decode($row2['asis_sede']),1,0, 'C', 0);
     $pdf->Cell(20,6,$row2['asis_horario'],1,1, 'C', 0);
   }

 }






$pdf->Output();
?>
