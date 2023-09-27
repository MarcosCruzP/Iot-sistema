<?php
require 'php/control_OEE.php';
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
      <br>

      <div class="reportes">
        <div class="por_dia">
          <form action="OEE_Dia.php" method="post" class="Dia">
            <select name="mes" >
              <option value="">Mes</option>
              <?php $day_n = 1; for ($i=0; $i < 12; $i++)  {
            ?>
              <option value="<?php echo $day_n?>"><?php echo $day_n ?></option>
            <?php  $day_n++; } ?>
            </select>

            <select name="dia">
              <option value="">Dia</option>
              <?php $mes_n = 1; for ($i=0; $i < 31; $i++)  {
            ?>
              <option value="<?php echo $mes_n ?>"><?php echo $mes_n?></option>
            <?php $mes_n++;} ?>
            </select>
            <button type="submit" >Ver reporte</button>
          </form>
        </div>

       <div class="por_sem">
        <form class="sem" action="OEE_Semanal.php" method="post">
          <select name="seman" >
            <option value="">semana</option>
            <?php  $sem_n = 1; for ($i=0; $i < 52; $i++)  {
          ?>
            <option value="<?php echo $sem_n?>"><?php echo $sem_n?></option>
          <?php $sem_n++; } ?>
          </select>
          <button type="submit">Ver reporte</button>
        </form>
        </div>
      </div>
      <br>

      <div class="cont_oee">
        <div class="datas_oee">
              <table class="table_datos_oee">
                <thead>
                  <tr>
                    <th>Maquina</th>
                    <th>Tiempo oper</th>
                    <th>Produccion real</th>
                    <th>Produccion meta</th>
                    <th>OEE</th>
                   </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Maquina1</td>
                    <td><b id="time_opm1">-- </b><span class="text-sm">  hrs</span></td>
                    <td><b id="prod_realm1">-- </b></td>
                    <td><b id="estandr_m1">-- </b></td>
                    <td><b id="OEE_M1">-- </b></td>
                  </tr>
                  <tr>
                    <td>Maquina2</td>
                    <td><b id="time_opm2">-- </b><span class="text-sm">  hrs</span></td>
                    <td><b id="prod_realm2">-- </b></td>
                    <td><b id="estandr_m2">-- </b></td>
                    <td><b id="OEE_M2">-- </b></td>

                  </tr>
                  <tr>
                    <td>Maquina3</td>
                    <td><b id="time_opm3">-- </b><span class="text-sm">  hrs</span></td>
                    <td><b id="prod_realm3">-- </b></td>
                    <td><b id="estandr_m3">-- </b></td>
                    <td><b id="OEE_M3">-- </b></td>

                  </tr>
                  <tr>
                    <td>Maquina4</td>
                    <td><b id="time_opm4">-- </b><span class="text-sm">  hrs</span></td>
                    <td><b id="prod_realm4">-- </b></td>
                    <td><b id="estandr_m4">-- </b></td>
                    <td><b id="OEE_M4">-- </b></td>

                  </tr>
                  <tr>
                    <td>Maquina5</td>
                    <td><b id="time_opm5">-- </b><span class="text-sm">  hrs</span></td>
                    <td><b id="prod_realm5">-- </b></td>
                    <td><b id="estandr_m5">-- </b></td>
                    <td><b id="OEE_M5">-- </b></td>

                  </tr>
                </tbody>
             </table>
        </div>

          <div class="chart_oee">
            <div class="graficas" style="width:100%; height:100%;">
               <canvas  clas="garfi"  id="myChart2"  style="width:95%; height:95%;"></canvas>
            </div>
          </div>
      </div>
      <br>

      <div class="chart_oee_dat">
        <div class="graficas" style="width:100%; height:100%;">
           <canvas  clas="garfi"  id="myChart1"  style="width:95%; height:95%;"></canvas>
        </div>
      </div>


    </div>


    <script src="../libs/menu_lat.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>

    <script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js "></script>
    <script src="js/Datas_OEE.js"></script>
    <script src="js/chart_oee.js"></script>

   </body>
</html>
