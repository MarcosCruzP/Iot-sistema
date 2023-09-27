<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  echo "Ingreso no autorizado";
  die();
}

$client = "client";
$num = "";
$code = "estndar";
$turno = "turno";
$Descrip = "descrip";
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['client'])  && isset($_POST['estndar']) && isset($_POST['turno']) && isset($_POST['descrip'])) {
  $client = strip_tags($_POST['client']);
  $num = strip_tags($_POST['Numero']);
  $code = strip_tags($_POST['estndar']);
  $turno = strip_tags($_POST['turno']);
  $Descrip = strip_tags($_POST['descrip']);

  $codebar = $num. "5879" . $client;

     $conn->query("INSERT INTO `almacen` (`alm_numero`, `alm_cliente`, `alm_turno`, `alm_codigo`, `alm_carac`, `alm_codebar` ) VALUES ('".$num."', '".$client."', '".$turno."', '".  $code."' , '".  $Descrip ."'  , '". $codebar ."');");

      header("Location: https://cinyciot.com/views/Operarios/codebar.php");

}

$query = mysqli_query($conn,"SELECT dato_stand FROM estandar");
$query1 = mysqli_query($conn,"SELECT dato_client FROM clientes");
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="shorcut icon" type="image/x-icon" href="../../Imagenes/CT.ico">

  <title>Cinvyc Technologies</title>
    <link rel="stylesheet" href="../../Estilos/icons/fontawesome-free-5.15.2-web/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <link rel="stylesheet" href="../../Estilos/estilos_dashboard4.css">
  <link rel="stylesheet" href="../../Estilos/fontello.css">
  <script src="../../libs/jquery-1.12.0.min.js"></script>



</head>
<body>

<!--////////////////////////////////// Menu lateral ////////////////////////////////////-->

  <div class="btn">
      <span class="fas fa-bars"></span>
    </div>
    <nav class="sidebar">
      <div class="text">Menu</div>
      <ul>
        <!--<li class="active"><a href="#">Guia</a></li>-->
        <li>
          <a href="#" class="feat-btn">Datos
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
            <li><a href="../Global.php">Procesamiento</a></li>
            <li><a href="../Disp.php">Dispositivos</a></li>
            <li><a href="../OEE.php">OEE</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="serv-btn">Almacen
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="../Almacen/stock.php">Stok</a></li>
            <li><a href="../Almacen/salidas.php">Salidas</a></li>
          </ul>
        </li>
       <li>
          <a href="#" class="Opr-btn">Operarios
            <span class="fas fa-caret-down three"></span>
          </a>
          <ul class="Opr-show">
            <li><a href="registro.php">Registros</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="conf-btn">Config
            <span class="fas fa-caret-down four"></span>
          </a>
          <ul class="conf-show">
            <li><a href="../Config/standar.php">Estandars</a></li>
            <li><a href="../Config/client.php">Clientes</a></li>
          </ul>
        </li>

      </ul>
    </nav>
<!--/////////////////////////////// Fin de Menu lateral /////////////////////////////////-->
<!--/////////////////////////////// Menu superior /////////////////////////////////-->
<header>
  <br>
   <h5 style="margin:14px;">Cerrar sesion</h5>

</header>
<!--/////////////////////////////// Contenido  /////////////////////////////////-->
    <div class="content">
      <div class="Info_global">
          <br>
           <div class="add_alm">
            <br>
            <h3 style="margin-left: 15px">Agregar a Almacen</h3>
            <br><br>



            <form action="" class="formulario" method="post">
              <div class="column_form">
              <select name="client" style="text-align: center;">
                <?php while ($datos1 = mysqli_fetch_array($query1))
                {
                ?>
                <option value="<?php echo $datos1['dato_client'] ?>"><?php echo $datos1['dato_client']  ?></option>
                <?php } ?>
              </select>
              </div>

            <div class="column_form">
                <input type="text" name="Numero" placeholder="numero">

                <select name="estndar">
                  <?php while ($datos = mysqli_fetch_array($query)) {
                  ?>
                   <option value="<?php echo $datos['dato_stand'] ?>"><?php echo $datos['dato_stand'] ?></option>
                   <?php } ?>
                </select>
              </div>



            <div class="column_form">
              <select name="turno">
                 <option value="Turno A">Turno A</option>
                 <option value="Turno B">Turno B</option>
                 <option value="Turno C">Turno C</option>
              </select>
              <input type="text" name="descrip" placeholder="Descripcion">
             </div>


            <div class="column_form">
               <button type="submit">Agregar</button>
          </div>
            </form>

            </div>
            </div>

    </div>


    <script src="../../libs/menu_lat.js"></script>



   </body>
</html>
