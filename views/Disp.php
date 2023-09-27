<?php
require 'php/contrl_disp.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="shorcut icon" type="image/x-icon" href="../Imagenes/CT.ico">

  <title>Cinvyc Technologies</title>
  <link rel="stylesheet" href="../Estilos/icons/fontawesome-free-5.15.2-web/css/all.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <link rel="stylesheet" href="../Estilos/estilos_dashboard4.css">
  <link rel="stylesheet" href="../Estilos/fontello.css">
  <script src="../libs/jquery-1.12.0.min.js"></script>



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
            <li><a href="Global.php">Procesamiento</a></li>
            <li><a href="Disp.php">Dispositivos</a></li>
            <li><a href="OEE.php">OEE</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="serv-btn">Almacen
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="Almacen/stock.php">Stok</a></li>
            <li><a href="Almacen/salidas.php">Salidas</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="Opr-btn">Operarios
            <span class="fas fa-caret-down three"></span>
          </a>
          <ul class="Opr-show">
            <li><a href="Operarios/registro.php">Registros</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="conf-btn">Config
            <span class="fas fa-caret-down four"></span>
          </a>
          <ul class="conf-show">
            <li><a href="Config/standar.php">Estandars</a></li>
            <li><a href="Config/client.php">Clientes</a></li>
          </ul>
        </li>

      </ul>
    </nav>
<!--/////////////////////////////// Fin de Menu lateral /////////////////////////////////-->
<!--/////////////////////////////// Menu superior /////////////////////////////////-->
<header>
  <br>
 <a href="../cerrar.php" style="color:#fff;"><h5 style="margin:14px;">Cerrar sesion</h5></a>

</header>
<!--/////////////////////////////// Contenido  /////////////////////////////////-->
    <div class="content">
      <div class="ingresos">
        <div class="add_form">
          <h3>Agrega nuevos dispositivos</h3>
          <br><br>

          <form method="post">
             <i class="icon fas fa-chess-bishop"></i><input type="text" name="alias" placeholder="Alias de dispositivo">
             <i class="icon fas fa-chess-bishop"></i><input type="text" name="Serie" placeholder="No. Serie">
             <i class="icon fas fa-chess-bishop"></i><input type="text" name="Sensores" placeholder="Sensors">
             <i class="icon fas fa-chess-bishop"></i><input type="text" name="Tipo" placeholder="Tipo">

             <button type="submit">AGREGAR DISP</button>
          </form>
        </div>

        <div class="delete_form">
          <h3>Elimina dispositivos</h3>
          <br><br><br>
          <form action="post">
            <select class="" name="nombreDEl" style="width: 60%; height: 30px; margin: 8px;">
              <option value="">buscar</option>
              <?php foreach ($devices as $device) {
                 ?>
                 <option value="<?php echo $device['devices_alias'] ?>"><?php echo $device['devices_alias'] ?></option>
               <?php } ?>
            </select>

            <button type="submit"  style="width: 30%; height: 30px; margin: 8px;">ELIMINAR</button>
          </form>
        </div>
      </div><br><br>

           <table class="table_datos">
             <thead>
                     <tr>
                         <th>Alias</th>
                         <th>Fecha</th>
                         <th>Serie</th>
                         <th>Tipo</th>
                         <th>Sensors</th>

                      </tr>
                 </thead>
             <tbody>
               <?php foreach ($devices as $device) {?>
                 <tr>
                   <td><?php echo $device['devices_alias'] ?></td>
                   <td><?php echo $device['devices_date'] ?></td>
                   <td><?php echo $device['devices_serie'] ?></td>
                   <td><?php echo $device['devices_tipo'] ?></td>
                   <td><?php echo $device['devices_sensores'] ?></td>
                 </tr>
               <?php } ?>
             </tbody>
         </table>
    </div>


    <script src="../libs/menu_lat.js"></script>

   </body>
</html>
