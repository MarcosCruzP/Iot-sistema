<?php

// session_start();
// $logged = $_SESSION['logged'];

// $usuario = $_SESSION['users_name'];

// $conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

// if ($conn==false){
//   echo "Hubo un problema al conectarse a María DB";
//   die();
// }

// if(!$logged ){
// 	header('Location: registrate.php');
//   die();
// }else{
/*	$result = $conn->query("SELECT * FROM `users` WHERE `users_name` = '".$usuario."' ");
	$users = $result->fetch_all(MYSQLI_ASSOC);

	//cuento cuantos elementos tiene $tabla,
	$count = count($users);
	if ($user_name = "cinvyc") {
		 header('Location: registrate.php');
	}*/
	header('Location: views/Global.php');
// }
$_SESSION['logged'] = true;

?>
