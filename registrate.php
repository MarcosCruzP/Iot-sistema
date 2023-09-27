<?php
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a cinvyc DB";
  die();
}

//declaramos variables vacias servirán también para repoblar el formulario
$usuario = "";
$industry = "";
$email = "";
$controlC = "";
$password = "";
$password2 = "";
$msg = "";

if( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $usuario = strip_tags($_POST['usuario']);
	$industry= strip_tags($_POST['industry']);
    $controlC = strip_tags($_POST['clave_protect']);
	$email = strip_tags( $_POST['email']);
	$password = strip_tags($_POST['password']);
	$password2 = strip_tags($_POST['password2']);


  if ($password==$password2){



    //aquí como todo estuvo OK, resta controlar que no exista previamente el mail ingresado en la tabla users.
    $result = $conn->query("SELECT * FROM `users` WHERE `users_email` = '".$email."' ");
    $users = $result->fetch_all(MYSQLI_ASSOC);

    //cuento cuantos elementos tiene $tabla,
    $count = count($users);


    //solo si no hay un usuario con mismo mail, procedemos a insertar fila con nuevo usuario
    if ($count == 0 ){
      /*$result1 = $conn1->query("SELECT * FROM `clave_service` WHERE `cd_clave` = '".$controlC."' ");
      $clave = $result1->fetch_all(MYSQLI_ASSOC);

        $clave = count($clave);

      if ( $clave != 0) {*/
        $password = sha1($password); //encriptar clave con sha1
        $conn->query("INSERT INTO `users` (`users_name`, `users_industry`, `users_clave`, `users_email`, `users_password`) VALUES ('".$usuario."', '".$industry."','".$controlC."', '".$email."', '".$password."');");
        $msg.="Usuario creado correctamente, ingrese haciendo  <a href='login.php'>clic aquí</a> <br>";
         header('Location: login.php');
        // code...
    /*  }
      else{
        $msg.="Clave de servicio incorrecta <br>";
    }*/
  }else{
      $msg.="El mail ingresado ya existe <br>";
    }

  }else{
    $msg = "Las claves no coinciden";
  }

}else{
  $msg = "Complete el formulario";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="Estilos/estilos1.css">
	<title>Crea una cuenta</title>
</head>
<body>
	<div class="contenedor">
		<div class="logo">
     			<img src="Imagenes/Cinvyc.png" width="350" height="125">
     		</div>
		<h1 class="titulo">Regístrate</h1>

		<hr class="border">

		<form class="formulario" name="login" method="POST" target="registrate.php">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="nombre de compañia">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-industry"></i><input class="industry" type="text" name="industry" placeholder="industria">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-cubes"></i><input class="industry" type="text" name="clave_protect" placeholder="clave de servicio">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-envelope"></i><input class="industry" type="text" name="email" placeholder="Correo">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password" type="password" name="password" placeholder="Contraseña">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password2" placeholder="Confirma Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $msg; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>

		<p class="texto-registrate">
			¿ Ya tienes cuenta ?
			<a href="login.php">Iniciar Sesión</a>
		</p>

	</div>
</body>
</html>
