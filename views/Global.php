<?php
require 'php/login_ctr.php';
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
  <button id="btn-abrir-popup" class="btn-abrir-popup">ver tabla</button>
  <button id="btn-cerrar-popup" class="btn-cerrar-popup">cerrar tabla</button>

   <a href="../cerrar.php" style="color:#fff;"><h5 style="margin:14px;">Cerrar sesion</h5></a>

</header>
<!--/////////////////////////////// Contenido  /////////////////////////////////-->
    <div class="content">

<!--/////////////////////////////// Nivel 1 de datos  /////////////////////////////////-->
      <div class="nivel" id="nivel">
        <div class="section">

          <div class="titulos">
          <i class="fa fa-tasks"></i><h4>unidades/minuto</h4>
          </div>
          <br>

          <div class="overlay" id="overlay" style="width: 100%;">
            <div class="popup" id="popup">
                 <table class="table_datos">
                            <thead>
                                <tr>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                 </tr>
                            </thead>
                        <tbody>
                            <tr>
                              <td>Maquina1</td>
                              <td><b id="maq1_sens1" >-- </b></td>
                              <td>Maquina4</td>
                              <td><b id="maq4_sens1" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina2</td>
                              <td><b id="maq2_sens1" >-- </b></td>
                              <td>Maquina5</td>
                              <td><b id="maq5_sens1" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina3</td>
                              <td><b id="maq3_sens1" >-- </b></td>
                            </tr>
                        </tbody>
                     </table>
            </div>
          </div><br>

          <div class="sensors">
            <div class="graficas" style="width:100%; height:100%;">
               <canvas  clas="garfi"  id="myChart6"  style="width:95%; height:95%;"></canvas>
            </div>
          </div><br>

          <hr color="white" size=1 style="width: 70%; background: cyan;"><br>


          <div class="overlay" id="overlay1">
            <div class="popup" id="popup1">
              <table class="table_datos">
                            <thead>
                                <tr>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                 </tr>
                            </thead>
                        <tbody>
                            <tr>
                              <td>Maquina1</td>
                              <td><b id="m1_prom1" >-- </b></td>
                              <td>Maquina4</td>
                              <td><b id="m4_prom1" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina2</td>
                              <td><b id="m2_prom1" >-- </b></td>
                              <td>Maquina5</td>
                              <td><b id="m5_prom1" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina3</td>
                              <td><b id="m3_prom1" >-- </b></td>
                            </tr>
                        </tbody>
                     </table>
            </div>
          </div><br>


          <div class="Grafics">
              <div class="graficas" style="width:100%; height:100%;">
                <canvas  clas="garfi"  id="myChart"  style="width:100%; height:95%;"></canvas>
              </div>
          </div>

      </div>

      <div class="section">

        <div class="titulos">
          <i class="fa fa-cog"></i><h4>RPMS</h4>
          </div>
       <br>

       <div class="overlay" id="overlay2" style="width: 100%;">
            <div class="popup" id="popup2">
                 <table class="table_datos">
                            <thead>
                                <tr>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                 </tr>
                            </thead>
                        <tbody>
                             <tr>
                              <td>Maquina1</td>
                              <td><b id="maq1_sens2" >-- </b></td>
                              <td>Maquina4</td>
                              <td><b id="maq4_sens2" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina2</td>
                              <td><b id="maq2_sens2" >-- </b></td>
                              <td>Maquina5</td>
                              <td><b id="maq5_sens2" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina3</td>
                              <td><b id="maq3_sens2" >-- </b></td>
                            </tr>
                        </tbody>
                     </table>
            </div>
          </div>

        <div class="Grafics" >
            <div class="graficas" style="width:100%; height:100%;">
              <canvas  clas="garfi"  id="myChart1"  style="width:100%; height:95%;"></canvas>
            </div>
        </div><hr color="white" size=1 style="width: 70%; margin: auto;"><br>




        <div class="overlay" id="overlay3" style="width: 100%;">
            <div class="popup" id="popup3">
                 <table class="table_datos">
                            <thead>
                                <tr>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                    <th>Maquina</th>
                                    <th>Dato</th>
                                 </tr>
                            </thead>
                        <tbody>
                            <tr>
                              <td>Maquina1</td>
                              <td><b id="m1_prom2" >-- </b></td>
                              <td>Maquina4</td>
                              <td><b id="m4_prom2" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina2</td>
                              <td><b id="m2_prom2" >-- </b></td>
                              <td>Maquina5</td>
                              <td><b id="m5_prom2" >-- </b></td>

                            </tr>
                            <tr>
                              <td>Maquina3</td>
                              <td><b id="m3_prom2" >-- </b></td>
                            </tr>
                        </tbody>
                     </table>
            </div>
          </div>

        <div class="sensors">
        <div class="graficas" style="width:100%; height:100%;">
             <canvas  clas="garfi"  id="myChart5"  style="width:95%; height:95%;"></canvas>
        </div>
        </div>

      </div>
     </div>




<!--/////////////////////////////// Nivel 2 de datos  /////////////////////////////////-->

<br>
<hr color="white" size=1 style="width: 80%; margin: auto;">
<br>


      <div class="nivel">
           <div class="section2">
            <div class="titulos" style="margin-bottom: 8px;">
              <i class="fa fa-cog"></i><h4>RPMS</h4>
              </div>
           <br>

              <div class="Grafics" >
                  <div class="graficas" style="width:100%; height:100%;">
                    <canvas  clas="garfi"  id="myChart2"  style="width:100%; height:95%;"></canvas>
                  </div>
              </div>
            </div>
      </div>

    </div>

    <script src="../libs/menu_lat.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>

    <script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js "></script>
    <script src="js/datas_global.js"></script>
    <script src="js/charts_global.js"></script>
    <script src="js/datos_tabla.js"></script>

   </body>
</html>
