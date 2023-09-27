<?php
require('../libs/pdf/fpdf.php');
	$id = 1;

	$dia = date("j");
	$mes = date("m");

if (isset($_POST['mes']) && isset($_POST['dia']) ) {
	$mes = $_POST['mes'];
	$dia = $_POST['dia'];
}




class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $id;

    // Logo
     $this->Image('../Imagenes/Cinvyc-logo.png',5,8,38);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
		// Salto de línea
		$this->Ln(4);
    // Movernos a la derecha
    $this->Cell(45);
    // Título
    $this->Cell(20,10,utf8_decode('REPORTE DE EFICIENCIA OEE'));
		$this->Cell(10);
    // Título
    $this->Cell(20,10,$fecha);
	//	$this->Cell(50,10,);

    // Salto de línea
    $this->Ln(16);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',7);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/'.$id,0,0,'C');
}
}
$code = "TurnoA";

$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");
$result = $conn->query("SELECT * FROM `eficiencias` WHERE `ef_turno` = '".$code."' and `ef_mes` = '".$mes."' and `ef_dia` = '".$dia."' ");
$almacen = $result->fetch_all(MYSQLI_ASSOC);

$count = count($almacen);

foreach ($almacen as $row) {
 $ef1 = $row['ef_maq1'];
 $suma =$suma + $ef1;
 $suma = $suma;

 $ef2 = $row['ef_maq2'];
 $suma1 =$suma1 + $ef2;
 $suma1 = $suma1;

 $ef3 = $row['ef_maq3'];
 $suma2 =$suma2 + $ef3;
 $suma2 = $suma2;

 $ef4= $row['ef_maq4'];
 $suma3 =$suma3 + $ef4;
 $suma3 = $suma3;

 $ef5 = $row['ef_maq5'];
 $suma4 =$suma4 + $ef5;
 $suma4 = $suma4;

 $Dt = $row['ef_timem1'];
 $time =  $Dt;

 $Dt1 = $row['ef_timem2'];
 $time_1 =  $Dt1;

 $Dt2 = $row['ef_timem3'];
 $time_2 =  $Dt2;
}
/*38764   3.28   22960*/
$real_m1 = $time*(($suma/$time)*1.07);
$prod1_m1 = substr(($suma/$real_m1)*100,0,4);
$disp1_m1 = substr(($time/9)*100,0,4);
$calidad1_m1 = 93.5;
$OEE1_m1 = substr((($prod1_m1 * $disp1_m1 * $calidad1_m1)/1000000)*100,0,4);

$real_m2 =  $time_1*(($suma1/$time_1)*1.09);
$prod1_m2 =  substr(($suma1/$real_m2)*100,0,4);
$disp1_m2 =substr(($time_1/9)*100,0,4);
$calidad1_m2 = 90.5;
$OEE1_m2 = substr((($prod1_m2 * $disp1_m2 * $calidad1_m2)/1000000)*100,0,4);

$real_m3 =  $time_2*(($suma2/$time_2)*1.05);
$prod1_m3 = substr(($suma2/$real_m3)*100,0,4);
$disp1_m3 = substr(($time_2/9)*100,0,4);
$calidad1_m3 = 96.3;
$OEE1_m3 = substr((($prod1_m3 * $disp1_m3 * $calidad1_m3)/1000000)*100,0,4);

$global = $OEE1_m3 +($OEE1_m2*2)+($OEE1_m1*2);
$ef_glob = $global/5;

$pdf = new PDF(); //use new class
$pdf->AddPage();

	 $pdf->SetFont('Arial','',7);
   $pdf->SetFillColor (15, 67, 199);
   $pdf->SetTextColor (255,255,255);
	 $pdf->Cell(5);
   $pdf->Cell(30,5,Maquina,1,0, 'C', true);
   $pdf->Cell(30,5,Turno ,1,0, 'C', true);
	 $pdf->Cell(30,5,'%'.Disponibilidad,1,0, 'C', true);
   $pdf->Cell(30,5,'%'.Rendimiento ,1,0, 'C', true);
	 $pdf->Cell(30,5,'%'.Calidad,1,0, 'C', true);
   $pdf->Cell(30,5,'%'.OEE,1,1, 'C', true);

	 $pdf->SetFillColor (255,255,255);
   $pdf->SetTextColor (0,0,0);
	 $pdf->Cell(5);
	 $pdf->Cell(30,6,'Maquina1',1,0, 'C', true);
   $pdf->Cell(30,6,$code,1,0, 'C', 0);
	 $pdf->Cell(30,6,$disp1_m1.'%',1,0, 'C', 0);
	 $pdf->Cell(30,6,$prod1_m1.'%',1,0, 'C', 0);
	 $pdf->Cell(30,6,$calidad1_m1.'%',1,0, 'C', 0);
	 $pdf->Cell(30,6,$OEE1_m1.'%',1,1, 'C', 0);

	 $pdf->SetFillColor (255,255,255);
	 $pdf->SetTextColor (0,0,0);
	 $pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina2',1,0, 'C', true);
	 $pdf->Cell(30,6,$code,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE1_m2.'%',1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina3',1,0, 'C', true);
	$pdf->Cell(30,6,$code,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp1_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod1_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad1_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE1_m3.'%',1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina4',1,0, 'C', true);
	$pdf->Cell(30,6,$code,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp1_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod1_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad1_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE1_m1.'%',1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina5',1,0, 'C', true);
	$pdf->Cell(30,6,$code,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad1_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE1_m2.'%',1,1, 'C', 0);



  //$this->Cell(75);
	$pdf->Ln(15);
  $pdf->SetFont('Arial','',6);
	$pdf->SetFillColor (15, 67, 199);
  $pdf->SetTextColor (255,255,255);
  $pdf->Cell(21,5,Concepto,1,0, 'C', true);
  $pdf->Cell(13,5,OEE,1,1, 'C', true);
	$pdf->SetFillColor (255,255,255);
	$pdf->SetTextColor (0,0,0);

  $pdf->Cell(21,5,'Maquina1',1,0, 'C', true);
  $pdf->Cell(13,5,$OEE1_m1.'%',1,1, 'C', 0);

  $pdf->Cell(21,5,'Maquina2',1,0, 'C', true);
  $pdf->Cell(13,5,$OEE1_m2.'%',1,1, 'C', 0);

  $pdf->Cell(21,5,'Maquina3',1,0, 'C', true);
  $pdf->Cell(13,5,$OEE1_m3.'%',1,1, 'C', 0);

  $pdf->Cell(21,5,'Maquina4',1,0, 'C', true);
  $pdf->Cell(13,5,$OEE1_m1.'%',1,1, 'C', 0);

  $pdf->Cell(21,5,'Maquina5',1,0, 'C', true);
  $pdf->Cell(13,5,$OEE1_m2.'%',1,1, 'C', 0);

	$pdf->Cell(21,5,'Total',1,0, 'C', true);
	$pdf->Cell(13,5,$ef_glob.'%',1,1, 'C', 0);

  //position
  $chartX=60;
  $chartY=70;

  //dimension
  $chartWidth=135;
  $chartHeight=60;

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
  	'Maquina1'=>[
  		'color'=>[24,90,210],
  		'value'=>$OEE1_m1],
  	'Maquina2'=>[
  		'color'=>[24,90,210],
  		'value'=>$OEE1_m2],
  	'Maquina3'=>[
  		'color'=>[24,90,210],
  		'value'=>$OEE1_m3],
  	'Maquina4'=>[
  		'color'=>[24,90,210],
  		'value'=>$OEE1_m1],
  	'Maquina5'=>[
  		'color'=>[24,90,210],
  		'value'=>$OEE1_m2]
  	);

    //$dataMax
    $dataMax=0;
    foreach($data as $item){
    	if($item['value']>$dataMax)$dataMax=100;
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
  $pdf->Cell(100,10,"% EFICIENCIA POR MAQUINA TURNO A",0,0,'C');
  //$pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-($chartBottomPadding/2));
  //$pdf->Cell(100,5,"Series",0,0,'C');


	$code1 = "TurnoB";

	$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");
	$result1 = $conn->query("SELECT * FROM `eficiencias` WHERE `ef_turno` = '".$code1."'and `ef_mes` = '".$mes."' and `ef_dia` = '".$dia."'");
	$almacen1 = $result1->fetch_all(MYSQLI_ASSOC);

	$count1 = count($almacen1);

	foreach ($almacen1 as $row) {
	 $ef1_b = $row['ef_maq1'];
	 $sma =$sma + $ef1_b;
	 $sma = $sma;

	 $ef2_b = $row['ef_maq2'];
	 $sma1 =$sma1 + $ef2_b;
	 $sma1 = $sma1;

	 $ef3_b = $row['ef_maq3'];
	 $sma2 =$sma2 + $ef3_b;
	 $sma2 = $sma2;

	 $ef4_b= $row['ef_maq4'];
	 $sma3 =$sma3 + $ef4_b;
	 $sma3 = $sma3;

	 $ef5_b = $row['ef_maq5'];
	 $sma4 =$sma4 + $ef5_b;
	 $sma4 = $sma4;

	 $Dt = $row['ef_timem1'];
   $time1 =  $Dt;

	 $Dt1 = $row['ef_timem2'];
	 $time1_1 =  $Dt1;

	 $Dt2 = $row['ef_timem3'];
	 $time1_2 =  $Dt2;
 }

  $real2_m1 = $time1*(($sma/$time1)*1.07);
  $prod2_m1 = substr(($sma/$real2_m1)*100,0,4);
  $disp2_m1 = substr(($time1/9)*100,0,4);
  $calidad2_m1 = 93.5;
  $OEE2_m1 = substr((($prod2_m1 * $disp2_m1 * $calidad2_m1)/1000000)*100,0,4);

	$real2_m2 = $time1_1*(($sma1/$time1_1)*1.09);
	$prod2_m2 = substr(($sma1/$real2_m2)*100,0,4);
	$disp2_m2 = substr(($time1_1/9)*100,0,4);
	$calidad2_m2 = 93.5;
	$OEE2_m2 = substr((($prod2_m2 * $disp2_m2 * $calidad2_m2)/1000000)*100,0,4);

	$real2_m3 = $time1_2*(($sma2/$time1_2)*1.05);
	$prod2_m3 = substr(($sma2/$real2_m3)*100,0,4);
	$disp2_m3 = substr(($time1_2/9)*100,0,4);
	$calidad2_m3 = 93.5;
	$OEE2_m3 = substr((($prod2_m3 * $disp2_m3 * $calidad2_m3)/1000000)*100,0,4);



	$global1 = $OEE2_m3 +($OEE2_m2*2)+($OEE2_m1*2);
	$ef_glob1 = $global1/5;

	$pdf->ln(66);
	$pdf->SetFont('Arial','',7);
	$pdf->SetFillColor (15, 67, 199);
	$pdf->SetTextColor (255,255,255);
	$pdf->Cell(5);
	$pdf->Cell(30,5,Maquina,1,0, 'C', true);
	$pdf->Cell(30,5,Turno ,1,0, 'C', true);
	$pdf->Cell(30,5,'%'.Disponibilidad,1,0, 'C', true);
	$pdf->Cell(30,5,'%'.Rendimiento ,1,0, 'C', true);
	$pdf->Cell(30,5,'%'.Calidad,1,0, 'C', true);
	$pdf->Cell(30,5,'%'.OEE,1,1, 'C', true);

	$pdf->SetFillColor (255,255,255);
	$pdf->SetTextColor (0,0,0);
	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina1',1,0, 'C', true);
	$pdf->Cell(30,6,$code1,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE2_m1.'%',1,1, 'C', 0);

	$pdf->SetFillColor (255,255,255);
	$pdf->SetTextColor (0,0,0);
	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina2',1,0, 'C', true);
	$pdf->Cell(30,6,$code1,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE2_m2.'%',1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina3',1,0, 'C', true);
	$pdf->Cell(30,6,$code1,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp2_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod2_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad2_m3.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE2_m3.'%',1,1, 'C', 0);

	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina4',1,0, 'C', true);
	$pdf->Cell(30,6,$code1,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad2_m1.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE2_m1.'%',1,1, 'C', 0);

	$pdf->SetFillColor (255,255,255);
	$pdf->SetTextColor (0,0,0);
	$pdf->Cell(5);
	$pdf->Cell(30,6,'Maquina5',1,0, 'C', true);
	$pdf->Cell(30,6,$code1,1,0, 'C', 0);
	$pdf->Cell(30,6,$disp2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$prod2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$calidad2_m2.'%',1,0, 'C', 0);
	$pdf->Cell(30,6,$OEE2_m2.'%',1,1, 'C', 0);



	  //$this->Cell(75);
		$pdf->Ln(25);
	  $pdf->SetFont('Arial','',6);
		$pdf->SetFillColor (15, 67, 199);
	  $pdf->SetTextColor (255,255,255);
	  $pdf->Cell(21,5,Concepto,1,0, 'C', true);
	  $pdf->Cell(13,5,OEE,1,1, 'C', true);
		$pdf->SetFillColor (255,255,255);
		$pdf->SetTextColor (0,0,0);

	  $pdf->Cell(21,5,'Maquina1',1,0, 'C', true);
	  $pdf->Cell(13,5,$OEE2_m1.'%',1,1, 'C', 0);

	  $pdf->Cell(21,5,'Maquina2',1,0, 'C', true);
	  $pdf->Cell(13,5,$OEE2_m2.'%',1,1, 'C', 0);

	  $pdf->Cell(21,5,'Maquina3',1,0, 'C', true);
	  $pdf->Cell(13,5,$OEE2_m3.'%',1,1, 'C', 0);

	  $pdf->Cell(21,5,'Maquina4',1,0, 'C', true);
	  $pdf->Cell(13,5,$OEE2_m1.'%',1,1, 'C', 0);

	  $pdf->Cell(21,5,'Maquina5',1,0, 'C', true);
	  $pdf->Cell(13,5,$OEE2_m2.'%',1,1, 'C', 0);

		$pdf->Cell(21,5,'Total',1,0, 'C', true);
		$pdf->Cell(13,5,$ef_glob1.'%',1,1, 'C', 0);

	  //position
	  $chartX=60;
	  $chartY=185;

	  //dimension
	  $chartWidth=135;
	  $chartHeight=60;

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
	  $data1=Array(
	  	'Maquina1'=>[
	  		'color'=>[24,90,210],
	  		'value'=>$OEE2_m1],
	  	'Maquina2'=>[
	  		'color'=>[24,90,210],
	  		'value'=>$OEE2_m2],
	  	'Maquina3'=>[
	  		'color'=>[24,90,210],
	  		'value'=>$OEE2_m3],
	  	'Maquina4'=>[
	  		'color'=>[24,90,210],
	  		'value'=>$OEE2_m1],
	  	'Maquina5'=>[
	  		'color'=>[24,90,210],
	  		'value'=>$OEE2_m2]
	  	);

	    //$dataMax
	    $dataMax=0;
	    foreach($data1 as $item){
	    	if($item['value']>$dataMax)$dataMax=100;
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
	  $xLabelWidth=$chartBoxWidth / count($data1);

	  //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
	  //loop horizontal axis and draw the bar
	  $barXPos=0;
	  foreach($data1 as $itemName=>$item){
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
	  $pdf->Cell(100,10,"% EFICIENCIA POR MAQUINA TURNO B",0,0,'C');
	  //$pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-($chartBottomPadding/2));
	  //$pdf->Cell(100,5,"Series",0,0,'C');

			$global_m1 = $OEE2_m1 + $OEE1_m1;
			$glob_m1 = $global_m1/2;

			$global_m2 = $OEE2_m2 + $OEE1_m2;
			$glob_m2 = $global_m2/2;

			$global_m3 =  $OEE2_m3 + $OEE1_m3;
			$glob_m3 = $global_m3/2;

			$global_m4 =  $OEE2_m1 + $OEE1_m1;
			$glob_m4 = $global_m4/2;

			$global_m5 = $OEE2_m2 + $OEE1_m2;
			$glob_m5 = $global_m5/2;

			$global_f = $glob_m1 +$glob_m2 + $glob_m3 + $glob_m4 + $glob_m5;
			$ef_glob_f = $global_f/5;

			$prod_glob1 = ($prod2_m1 + $prod1_m1)/2;
		  $prod_glob2 = ($prod2_m2 + $prod1_m2)/2;
			$prod_glob3 = ($prod2_m3 + $prod1_m3)/2;


			$dip_glob1 = ($disp2_m1 + $disp1_m1)/2;
			$dip_glob2 = ($disp2_m2 + $disp1_m2)/2;
			$dip_glob3 = ($disp2_m3 + $disp1_m3)/2;

			$pr1 = $sma +$suma;
			$pr2 = $sma1 +$suma1;
			$pr3 = $sma2 +$suma2;



			$real2_m3 = $time1_2*6200;
			$prod2_m3 = substr(($sma2/$real2_m3)*100,0,4);
			$disp2_m3 = substr(($time1_2/9)*100,0,4);
			$calidad2_m3 = 93.5;
			$OEE2_m3 = substr((($prod2_m3 * $disp2_m3 * $calidad2_m3)/1000000)*100,0,4);

$pdf->AddPage();

$pdf->ln(5);
$pdf->SetFont('Arial','',7);
$pdf->SetFillColor (15, 67, 199);
$pdf->SetTextColor (255,255,255);
$pdf->Cell(5);
$pdf->Cell(30,5,Maquina,1,0, 'C', true);
$pdf->Cell(30,5,Prod_Real ,1,0, 'C', true);
$pdf->Cell(30,5,'%'.Disponibilidad,1,0, 'C', true);
$pdf->Cell(30,5,'%'.Rendimiento ,1,0, 'C', true);
$pdf->Cell(30,5,'%'.Calidad,1,0, 'C', true);
$pdf->Cell(30,5,'%'.OEE,1,1, 'C', true);

$pdf->SetFillColor (255,255,255);
$pdf->SetTextColor (0,0,0);
$pdf->Cell(5);
$pdf->Cell(30,6,'Maquina1',1,0, 'C', true);
$pdf->Cell(30,6,$pr1,1,0, 'C', 0);
$pdf->Cell(30,6,$dip_glob1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$prod_glob1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$calidad2_m1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$glob_m1.'%',1,1, 'C', 0);

$pdf->SetFillColor (255,255,255);
$pdf->SetTextColor (0,0,0);
$pdf->Cell(5);
$pdf->Cell(30,6,'Maquina2',1,0, 'C', true);
$pdf->Cell(30,6,$pr2,1,0, 'C', 0);
$pdf->Cell(30,6,$dip_glob2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$prod_glob2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$calidad2_m2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$glob_m2.'%',1,1, 'C', 0);

$pdf->Cell(5);
$pdf->Cell(30,6,'Maquina3',1,0, 'C', true);
$pdf->Cell(30,6,$pr3,1,0, 'C', 0);
$pdf->Cell(30,6,$dip_glob3.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$prod_glob3.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$calidad2_m3.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$glob_m3.'%',1,1, 'C', 0);
$pdf->Cell(5);
$pdf->Cell(30,6,'Maquina4',1,0, 'C', true);
$pdf->Cell(30,6,$pr1,1,0, 'C', 0);
$pdf->Cell(30,6,$dip_glob1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$prod_glob1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$calidad2_m1.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$glob_m1.'%',1,1, 'C', 0);

$pdf->SetFillColor (255,255,255);
$pdf->SetTextColor (0,0,0);
$pdf->Cell(5);
$pdf->Cell(30,6,'Maquina5',1,0, 'C', true);
$pdf->Cell(30,6,$pr2,1,0, 'C', 0);
$pdf->Cell(30,6,$dip_glob2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$prod_glob2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$calidad2_m2.'%',1,0, 'C', 0);
$pdf->Cell(30,6,$glob_m2.'%',1,1, 'C', 0);


				$pdf->Ln(15);
			  $pdf->SetFont('Arial','',6);
				$pdf->SetFillColor (15, 67, 199);
			  $pdf->SetTextColor (255,255,255);
			  $pdf->Cell(21,5,Concepto,1,0, 'C', true);
			  $pdf->Cell(13,5,OEE,1,1, 'C', true);
				$pdf->SetFillColor (255,255,255);
				$pdf->SetTextColor (0,0,0);

			  $pdf->Cell(21,5,'Maquina1',1,0, 'C', true);
			  $pdf->Cell(13,5,$glob_m1.'%',1,1, 'C', 0);

			  $pdf->Cell(21,5,'Maquina2',1,0, 'C', true);
			  $pdf->Cell(13,5,$glob_m2.'%',1,1, 'C', 0);

			  $pdf->Cell(21,5,'Maquina3',1,0, 'C', true);
			  $pdf->Cell(13,5,$glob_m3.'%',1,1, 'C', 0);

			  $pdf->Cell(21,5,'Maquina4',1,0, 'C', true);
			  $pdf->Cell(13,5,$glob_m4.'%',1,1, 'C', 0);

			  $pdf->Cell(21,5,'Maquina5',1,0, 'C', true);
			  $pdf->Cell(13,5,$glob_m5.'%',1,1, 'C', 0);

				$pdf->Cell(21,5,'Total',1,0, 'C', true);
				$pdf->Cell(13,5,$ef_glob_f.'%',1,1, 'C', 0);

				//position
 		   $chartX=60;
 		   $chartY=80;


			  //dimension
			  $chartWidth=135;
			  $chartHeight=60;

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
			  $data2=Array(
			  	'Maquina1'=>[
			  		'color'=>[24,90,210],
			  		'value'=>$glob_m1],
			  	'Maquina2'=>[
			  		'color'=>[24,90,210],
			  		'value'=>$glob_m2],
			  	'Maquina3'=>[
			  		'color'=>[24,90,210],
			  		'value'=>$glob_m3],
			  	'Maquina4'=>[
			  		'color'=>[24,90,210],
			  		'value'=>$glob_m4],
			  	'Maquina5'=>[
			  		'color'=>[24,90,210],
			  		'value'=>$glob_m5]
			  	);

			    //$dataMax
			    $dataMax=0;
			    foreach($data2 as $item){
			    	if($item['value']>$dataMax)$dataMax=100;
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
			  $xLabelWidth=$chartBoxWidth / count($data2);

			  //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
			  //loop horizontal axis and draw the bar
			  $barXPos=0;
			  foreach($data2 as $itemName=>$item){
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
			  $pdf->Cell(100,10,"% EFICIENCIA GLOBAL OEE",0,0,'C');
			  //$pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-($chartBottomPadding/2));
			  //$pdf->Cell(100,5,"Series",0,0,'C');
$pdf->Output();
?>
