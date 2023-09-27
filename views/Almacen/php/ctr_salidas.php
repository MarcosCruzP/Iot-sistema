<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  header('Location: ../../login.php');
  die();
}
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

$query = mysqli_query($conn,"SELECT dato_stand FROM estandar");
$query1 = mysqli_query($conn,"SELECT dato_client FROM clientes");


$result = $conn->query("SELECT * FROM `almacen_salida`");
$almacen = $result->fetch_all(MYSQLI_ASSOC);
?>
