<?php
require 'php/ctr_stock.php';
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
            <li><a href="stock.html">Stok</a></li>
            <li><a href="salidas.php">Salidas</a></li>
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
  <a href="../../cerrar.php" style="color:#fff;"><h5 style="margin:14px;">Cerrar sesion</h5></a>

</header>
<!--/////////////////////////////// Contenido  /////////////////////////////////-->
    <div class="content">

    <br>

    <div class="box-report">
        <h2>Stock</h2>
        <a href="Reporte.php"><i  style="  margin-right: 6px; color:#fff; font-style: none;" class="far fa-file-pdf"></i><span class="text_manLat" style="  margin-right: 16px; color:#fff; font-style: none;">Descargar stock</span></a>
    </div>
    <br>

    <div class="filtros">
      <label for="" style="margin-left:8px; color: cyan;">Cliente </label>
      <label for="" style="margin-left:18%; color: cyan;">Turno </label>
      <label for="" style="margin-left:18%; color: cyan;">Codigo </label>

      <form action="" class="formulario" method="post">
        <select name="client" style="text-align: center;">
            <option value="TODO">TODO</option>
            <?php while ($datos1 = mysqli_fetch_array($query1))
            {
            ?>
            <option value="<?php echo $datos1['dato_client'] ?>"><?php echo $datos1['dato_client']  ?></option>
            <?php } ?>
          </select>

          <select name="turno">
            <option value="TODO">TODO</option>
             <option value="Turno A">Turno A</option>
             <option value="Turno B">Turno B</option>
             <option value="Turno C">Turno C</option>
          </select>

          <select name="estndar">
            <option value="TODO">TODO</option>
            <?php while ($datos = mysqli_fetch_array($query)) {
            ?>
             <option value="<?php echo $datos['dato_stand'] ?>"><?php echo $datos['dato_stand'] ?></option>
             <?php } ?>
          </select>


           <button type="submit">Filtrar</button>
      </form>
    </div><br><br>


        <table class="table table-striped b-t">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Turno</th>
                        <th>Codgio</th>
                        <th>Codigo de barras</th>
                        <th>Descrpcion</th>
                     </tr>
                </thead>
            <tbody>
              <?php $numer = $almacen['alm_numero'];
              sort($numer);
              foreach ($almacen as $alm) {

                  $dato_fech = $alm['alm_date'];
                  $fecha = substr($dato_fech, 0,10);
                ?>
                <tr>
                  <td><?php echo $alm['alm_numero'] ?></td>
                  <td><?php echo $alm['alm_cliente'] ?></td>
                  <td><?php echo $fecha?></td>
                  <td><?php echo $alm['alm_turno'] ?></td>
                  <td><?php echo $alm['alm_codigo'] ?></td>
                  <td><?php echo $alm['alm_codebar'] ?></td>
                  <td><?php echo $alm['alm_carac'] ?></td>
                </tr>
              <?php } ?>
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
