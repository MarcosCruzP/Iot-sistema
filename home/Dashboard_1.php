
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shorcut icon" type="image/x-icon" href="../Imagenes/CT.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <link rel="stylesheet" href="../estilos/style_dashboard.css">
    <link rel="stylesheet" href="../estilos/fontello.css">

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
          <a href="#" class="feat-btn active">style
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
            <li><a href="Dashboard_1.html">Datos</a></li>
            <li><a href="Dashboard_1-Charts.html">Graficas</a></li>
            <li><a href="Dashboard_1-Mix.html">Mixto</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="serv-btn">vista
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
            <li><a href="Dashboard_1_int.html">Solo int</a></li>
            <li><a href="Dashboard_1_out.html">Solo out</a></li>
          </ul>
        </li>
        <li class=""><a href="Dashboard_1-topic.html">List_topic</a></li>
        <li class=""><a href="Dashboard_1-Conf.html">Configuracion</a></li>

      </ul>
    </nav>
<!--/////////////////////////////// Fin de Menu lateral /////////////////////////////////-->
<header>
  <img src="../Imagenes/Cinvyc.png">
</header>

<!--***************************CONTENIDO ************************-->
<div class="content">
  <div class="content_int">
    <h2>Entradas</h2>
    <div class="cuadro_dato">
       <div class="text">
        <h6>Dato 1</h6>
         <b id="maq1_sens#" > -- </b><span class="text-sm"> </span>
        <h6>tipo de dato</h6>
       </div>
    </div>

    <div class="cuadro_dato">
       <div class="text">
        <h6>Dato 1</h6>
         <b id="maq1_sens#" > -- </b><span class="text-sm"> </span>
        <h6>tipo de dato</h6>
       </div>
    </div>

    <div class="cuadro_dato">
       <div class="text">
        <h6>Dato 1</h6>
         <b id="maq1_sens#" > -- </b><span class="text-sm"> </span>
        <h6>tipo de dato</h6>
       </div>
    </div>

    <div class="cuadro_dato">
       <div class="text">
        <h6>Dato 1</h6>
         <b id="maq1_sens#" > -- </b><span class="text-sm"> </span>
        <h6>tipo de dato</h6>
       </div>
    </div>

    <div class="cuadro_dato">
       <div class="text">
        <h6>Dato 1</h6>
         <b id="maq1_sens#" > -- </b><span class="text-sm"> </span>
        <h6>tipo de dato</h6>
       </div>
    </div>
   </div>

   <div class="content_out">
    <h2>Salidas</h2>
     <div class="cuadro_dato">
      <h5>Salida 1</h5>
        <div class="checkbox">
          <input type="checkbox" id="click">
          <label for="click" class="text"></label>
        </div>
    </div>

    <div class="cuadro_dato">
      <h5>Salida 1</h5>
        <div class="checkbox">
          <input type="checkbox" id="click">
          <label for="click" class="text"></label>
        </div>
    </div>

    <div class="cuadro_dato">
      <h5>Salida 1</h5>
        <div class="checkbox">
          <input type="checkbox" id="click">
          <label for="click" class="text"></label>
        </div>
    </div>
   </div>

</div>




    <script src="js/menu_lat.js"></script>
    <script src="../libs/jquery/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
    <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <!-- core -->
    <script src="../libs/jquery/underscore/underscore-min.js"></script>
    <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="../libs/jquery/PACE/pace.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>

    <script src="https://unpkg.com/mqtt@4.1.0/dist/mqtt.min.js "></script>


   </body>
</html>
