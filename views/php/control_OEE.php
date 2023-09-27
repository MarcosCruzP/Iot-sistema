<?php
session_start();
$logged = $_SESSION['logged'];

// if(!$logged){
//   header('Location: ../login.php');
//   die();
// }
$Min = date('i');
$Hora = date('H');
$code = "TurnoA";
$fecha = date("Y-m-d");
$dia = date("j");
//$dia = date("j");
$semana = date("W");


// $conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

// if ($conn==false){
//   echo "Hubo un problema al conectarse a María DB";
//   die();
// }

// $result = $conn->query("SELECT * FROM `eficiencias` WHERE `ef_turno` = '".$code."'");
// $almacen = $result->fetch_all(MYSQLI_ASSOC);

?>
