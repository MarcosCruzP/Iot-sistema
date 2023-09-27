<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  header('Location: ../login.php');
  die();
}

$alias = "";
$sens = "";
$serie = "";
$tipo = "";
  $dell="";
$user_id = $_SESSION['user_id'];
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['Sensores']) && isset($_POST['Tipo']) && isset($_POST['Serie']) && isset($_POST['alias'])) {

  $alias = strip_tags($_POST['alias']);
  $sens = strip_tags($_POST['Sensores']);
  $serie = strip_tags($_POST['Serie']);
  $tipo = strip_tags($_POST['Tipo']);
  $conn->query("INSERT INTO `devices` (`devices_alias`, `devices_serie`, `devices_tipo`, `devices_sensores`, `devices_user_id`) VALUES ('".$alias."', '".$serie."', '".$tipo."', '".$sens."', '".$user_id."');");

}

if( isset($_POST['nombreDEl'])) {
  $dell = strip_tags($_POST['nombreDEl']);
  $conn->query("DELETE FROM `devices` WHERE `devices_alias` = '".$dell."' ");

}

$result = $conn->query("SELECT * FROM `devices` WHERE `devices_user_id` = '".$user_id."'");
$devices = $result->fetch_all(MYSQLI_ASSOC);
?>
