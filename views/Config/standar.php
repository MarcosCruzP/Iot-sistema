<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  echo "Ingreso no autorizado";
  die();
}

$Date = "";
$Descrip = "";
$NT = "";
$H1 ="";
$H2 = "";
$dell= "";
$dell2="";
//momento de conectarnos a db
$conn = mysqli_connect("localhost", "admin_cinvyciot", "contrDBinfoGlobTraficRegUsrMpC", "admin_IoTusers");

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['dato']) && isset($_POST['des'])) {
  $Date = strip_tags($_POST['dato']);
  $Descrip = strip_tags($_POST['des']);
  $conn->query("INSERT INTO `estandar` (`dato_stand`, `des_stand`) VALUES ('".$Date."', '".$Descrip."');");
}

if( isset($_POST['nombre_turno'])) {
  $NT = strip_tags($_POST['nombre_turno']);
  $H1 = strip_tags($_POST['H1']);
  $H2 = strip_tags($_POST['H2']);
  $conn->query("INSERT INTO `turnos` (`turn_name`, `turn_h1`, `turn_h2`) VALUES ('".$NT."', '".$H1."', '".$H2."');");
}

if( isset($_POST['nombreDEl'])) {
  $dell = strip_tags($_POST['nombreDEl']);
  $conn->query("DELETE FROM `turnos` WHERE `turn_name` = '".$dell."' ");

}

if( isset($_POST['nombreDEl2'])) {
  $dell2 = strip_tags($_POST['nombreDEl2']);
  $conn->query("DELETE FROM `estandar` WHERE `dato_stand` = '".$dell2."' ");

}

$result = $conn->query("SELECT * FROM `estandar`");
$devices = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT * FROM `turnos`");
$Turnos = $result1->fetch_all(MYSQLI_ASSOC);
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
             <i class="icon fas fa-chess-bishop"></i><input name="nombre_turno" type="text"  placeholder="Dale Nombre al turno ">
             <i class="icon fas fa-chess-bishop"></i><select name="H1" style="width:30%;">
                                                          <option value="0">00 Hrs</option>
                                                          <option value="1">01 Hrs</option>
                                                          <option value="2">02 Hrs</option>
                                                          <option value="3">03 Hrs</option>
                                                          <option value="4">04 Hrs</option>
                                                          <option value="5">05 Hrs</option>
                                                          <option value="6">06 Hrs</option>
                                                          <option value="7">07 Hrs</option>
                                                          <option value="8">08 Hrs</option>
                                                          <option value="9">09 Hrs</option>
                                                          <option value="10">10 Hrs</option>
                                                          <option value="11">11 Hrs</option>
                                                          <option value="12">12 Hrs</option>
                                                          <option value="13">13 Hrs</option>
                                                          <option value="14">14 Hrs</option>
                                                          <option value="15">15 Hrs</option>
                                                          <option value="16">16 Hrs</option>
                                                          <option value="17">17 Hrs</option>
                                                          <option value="18">18 Hrs</option>
                                                          <option value="19">19 Hrs</option>
                                                          <option value="20">20 Hrs</option>
                                                          <option value="21">21 Hrs</option>
                                                          <option value="22">22 Hrs</option>
                                                          <option value="23">23 Hrs</option>
                                                       </select>
             <i class="icon fas fa-chess-bishop"></i><select name="H2" style="width:30%;">
                                                         <option value="0">00 Hrs</option>
                                                         <option value="1">01 Hrs</option>
                                                         <option value="2">02 Hrs</option>
                                                         <option value="3">03 Hrs</option>
                                                         <option value="4">04 Hrs</option>
                                                         <option value="5">05 Hrs</option>
                                                         <option value="6">06 Hrs</option>
                                                         <option value="7">07 Hrs</option>
                                                         <option value="8">08 Hrs</option>
                                                         <option value="9">09 Hrs</option>
                                                         <option value="10">10 Hrs</option>
                                                         <option value="11">11 Hrs</option>
                                                         <option value="12">12 Hrs</option>
                                                         <option value="13">13 Hrs</option>
                                                         <option value="14">14 Hrs</option>
                                                         <option value="15">15 Hrs</option>
                                                         <option value="16">16 Hrs</option>
                                                         <option value="17">17 Hrs</option>
                                                         <option value="18">18 Hrs</option>
                                                         <option value="19">19 Hrs</option>
                                                         <option value="20">20 Hrs</option>
                                                         <option value="21">21 Hrs</option>
                                                         <option value="22">22 Hrs</option>
                                                         <option value="23">23 Hrs</option>
                                                      </select>

             <button type="submit">AGREGAR</button>
          </form>
        </div>

        <div class="delete_form">
          <h3>Elimina dispositivos</h3>
          <br><br><br>
          <form action="post">
            <select name="nombreDEl" >
          <option value="">Selecciona</option>
          <?php foreach ($Turnos as $turn) {
             ?>
             <option value="<?php echo $turn['turn_name'] ?>"><?php echo $turn['turn_name']?></option>
           <?php } ?>
        </select>

            <button type="submit">ELIMINAR</button>
          </form>
        </div>
      </div><br>
      <table class="table table-striped b-t">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Turno</th>
                      <th>Entrada</th>
                      <th>Salida</th>
                   </tr>
              </thead>
          <tbody>
            <?php $cant=1;
            foreach ($Turnos as $turn) {?>
              <tr>
                <td><?php echo $cant?></td>
                <td><?php echo $turn['turn_name']?></td>
                <td><?php echo $turn['turn_h1']. ":00 Hrs"  ?></td>
                <td><?php echo $turn['turn_h2']. ":00 Hrs"  ?></td>
              </tr>
            <?php  $cant++;} ?>
          </tbody>
       </table>


       <div class="ingresos">
        <div class="add_form">
          <h3>Agrega nuevos dispositivos</h3>
          <br><br>

          <form method="post">
             <i class="icon fas fa-chess-bishop"></i> <input name="dato" type="text" class="form-control" placeholder="Ej: CODIGO 1">
             <i class="icon fas fa-chess-bishop"></i><input name="des" type="text" class="form-control" placeholder="Ej: Codigo numero #">

             <button type="submit">Registrar</button>
          </form>
        </div>

        <div class="delete_form">
          <h3>Elimina dispositivos</h3>
          <br><br><br>
          <form action="post">
            <select class="" name="nombreDEl2">
                <option value="">Selecciona</option>
                <?php  foreach ($devices as $device) {
                   ?>
                   <option value="<?php echo $device['dato_stand']?>"><?php echo $device['dato_stand']?></option>
                 <?php } ?>
              </select>

            <button type="submit">ELIMINAR</button>
          </form>
        </div>
      </div><br>
      <table class="table table-striped b-t">
          <thead>
                   <tr>
                       <th>No.</th>
                       <th>Dato</th>
                       <th>Descripcion</th>
                    </tr>
               </thead>
           <tbody>
             <?php $conter = 1;
             foreach ($devices as $device) {?>
               <tr>
                 <td><?php echo  $conter ?></td>
                 <td><?php echo $device['dato_stand'] ?></td>
                 <td><?php echo $device['des_stand'] ?></td>
               </tr>
             <?php  $conter++; } ?>
           </tbody>
       </table>
    </div>


    <script src="../../libs/menu_lat.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="../../libs/jquery/jquery-pjax/jquery.pjax.js"></script>

    <script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js "></script>


   </body>
</html>
