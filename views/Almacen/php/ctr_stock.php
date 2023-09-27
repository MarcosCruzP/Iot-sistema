<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  header('Location: ../../login.php');
  die();
}


$client = "client";
$code = "estndar";
$turno = "turno";
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['client']) && isset($_POST['estndar']) && isset($_POST['turno'])) {
  $client = strip_tags($_POST['client']);
  $code = strip_tags($_POST['estndar']);
  $turno = strip_tags($_POST['turno']);

  if ($client == TODO && $code == TODO &&  $turno == TODO) {
    $result = $conn->query("SELECT * FROM `almacen` ");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client != TODO && $code != TODO &&  $turno != TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_turno` = '".$turno."' and `alm_cliente` = '".$client."' and `alm_codigo` = '".$code."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client != TODO && $code != TODO &&  $turno == TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_cliente` = '".$client."' and `alm_codigo` = '".$code."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client != TODO && $code == TODO &&  $turno == TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_cliente` = '".$client."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client == TODO && $code != TODO &&  $turno != TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_turno` = '".$turno."' and `alm_codigo` = '".$code."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client == TODO && $code == TODO &&  $turno != TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_turno` = '".$turno."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }

  elseif ($client == TODO && $code != TODO &&  $turno == TODO) {
    $result = $conn->query("SELECT * FROM `almacen` WHERE `alm_codigo` = '".$code."'");
    $almacen = $result->fetch_all(MYSQLI_ASSOC);
  }



}else {
  $result = $conn->query("SELECT * FROM `almacen` ");
  $almacen = $result->fetch_all(MYSQLI_ASSOC);
}

 //WHERE `alm_cliente` = '".$cliente."' and `alm_codigo` = '".$codigo."'
$query = mysqli_query($conn,"SELECT dato_stand FROM estandar");
$query1 = mysqli_query($conn,"SELECT dato_client FROM clientes");
?>
