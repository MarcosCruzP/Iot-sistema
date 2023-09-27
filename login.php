<?php

session_start();
$_SESSION['logged'] = false;

$msg="";
$email="";

if(isset($_POST['usuario']) && isset($_POST['password'])) {

  if ($_POST['usuario']==""){
    $msg.="Debe ingresar un email <br>";
  }else if ($_POST['password']=="") {
    $msg.="Debe ingresar la clave <br>";
  }else {
    $usuario = strip_tags($_POST['usuario']);
    $password= sha1(strip_tags($_POST['password']));

    // //momento de conectarnos a db
    // $conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");


    // if ($conn==false){
    //   echo "Hubo un problema al conectarse a María DB";
    //   die();
    // }

    $result = $conn->query("SELECT * FROM `users` WHERE `users_name` = '".$usuario."' AND  `users_password` = '".$password."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);


    //cuento cuantos elementos tiene $tabla,
    $count = count($users);

    if ($count == 1){

      //cargo datos del usuario en variables de sesión
      $_SESSION['user_id'] = $users[0]['users_id'];
      $_SESSION['users_name'] = $users[1]['users_name'];

      $msg .= "Exito!!!";
      $_SESSION['logged'] = true;
      header('Location: views/Global.php');
     // echo '<meta http-equiv="refresh" content="2; url=dashboard.php">';
    }else{
      $msg .= "Acceso denegado!!!";
      $_SESSION['logged'] = false;
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="shorcut icon" type="image/x-icon" href="Imagenes/CT.ico">
	<link rel="stylesheet" href="Estilos/estilos1.css">
	<title>Iniciar Sesión</title>
</head>
<body>
	<div class="contenedor">
		<div class="logo">
     			<img src="Imagenes/Cinvyc.png" width="350" height="125">
     		</div><br />
		<h1 class="titulo">Iniciar Sesión</h1>

		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="nombre de compañia">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password" placeholder="Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>

		<p class="texto-registrate">
			¿ Aun no tienes cuenta ?
			<a href="registrate.php">Regístrate</a>
		</p>

	</div>
</body>
</html>
