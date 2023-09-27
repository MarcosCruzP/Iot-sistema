<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  echo "Ingreso no autorizado";
  die();
}

$Date = "";
$Descrip = "";
$dell = "";
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['dato']) && isset($_POST['des'])) {

  $Date = strip_tags($_POST['dato']);
  $Descrip = strip_tags($_POST['des']);
  $conn->query("INSERT INTO `clientes` (`dato_client`, `des_client`) VALUES ('".$Date."', '".$Descrip."');");
}

if( isset($_POST['nombreDEl'])) {
  $dell = strip_tags($_POST['nombreDEl']);
  $conn->query("DELETE FROM `clientes` WHERE `dato_client` = '".$dell."' ");

}

$result = $conn->query("SELECT * FROM `clientes`");
$devices = $result->fetch_all(MYSQLI_ASSOC);
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
            <li><a href="../OEEphpl">OEE</a></li>
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
            <li><a href="../Operarios/registro.php">Registros</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="conf-btn">Config
            <span class="fas fa-caret-down four"></span>
          </a>
          <ul class="conf-show">
            <li><a href="standar.php">Estandars</a></li>
            <li><a href="client.php">Clientes</a></li>
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
       <div class="ingresos">
        <div class="add_form">
          <h3>Agrega nuevos dispositivos</h3>
          <br><br>

          <form method="post">
             <i class="icon fas fa-chess-bishop"></i><input name="dato" type="text" placeholder="Ej: Cliente 1">
             <i class="icon fas fa-chess-bishop"></i><input name="des" type="text"  placeholder="Ej: Cliente de CDMX">

             <button type="submit">AGREGAR DISP</button>
          </form>
        </div>

        <div class="delete_form">
          <h3>Elimina dispositivos</h3>
          <br><br><br>
          <form method="post">
            <select class="" name="nombreDEl" >
              <option value="">Selecciona</option>
              <?php foreach ($devices as $device) {
                 ?>
                 <option value="<?php echo $device['dato_client'] ?>"><?php echo $device['dato_client'] ?></option>
               <?php } ?>
            </select>

            <button type="submit">ELIMINAR DISP</button>
          </form>
        </div>
      </div><br>
      <div class="">

      <table class="table table-striped b-t">
        <thead>
                  <tr>
                      <th>No.</th>
                      <th>Dato</th>
                      <th>Descripcion</th>
                   </tr>
              </thead>
          <tbody>
            <?php  $cuenta=1;
            foreach ($devices as $device) {?>
              <tr>
                <td><?php echo $cuenta?></td>
                <td><?php echo $device['dato_client'] ?></td>
                <td><?php echo $device['des_client'] ?></td>
              </tr>
            <?php $cuenta++;} ?>
          </tbody>
       </table>

     </div>

    </div>


    <script src="../../libs/menu_lat.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="../../libs/jquery/jquery-pjax/jquery.pjax.js"></script>

    <script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js "></script>


   </body>
</html>
