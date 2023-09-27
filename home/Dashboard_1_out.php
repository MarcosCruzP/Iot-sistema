
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

    <link rel="stylesheet" href="estilos/style_dashboard.css">
    <link rel="stylesheet" href="estilos/fontello.css">

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
   <div class="content_out">
    <h2>Salidas</h2>
     <div class="cuadro_dato">
      <h5>Salida 1</h5>
        <div class="checkbox">
          <input type="checkbox" id="input_led1" onchange="process_led1()" >
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
          <input type="checkbox" id="click3">
          <label for="click" class="text"></label>
        </div>
    </div>
   </div>

</div>




    <script src="js/menu_lat.js"></script>
    <script src="../libs/jquery/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->

    <!-- ajax -->
    <script src="libs/jquery/jquery-pjax/jquery.pjax.js"></script>
    <script src="html/scripts/ajax.js"></script>

    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script type="text/javascript">

    /*
    ******************************
    ****** PROCESOS  *************
    ******************************
    */



    function process_led1(){
      if ($('#input_led1').is(":checked")){
        console.log("Encendido");

        client.publish('led1', 'on', (error) => {
          console.log(error || 'Mensaje enviado!!!')
        })
      }else{
        console.log("Apagado");
        client.publish('led1', 'off', (error) => {
          console.log(error || 'Mensaje enviado!!!')
        })
      }
    }

    function process_led2(){
      if ($('#input_led2').is(":checked")){
        console.log("Encendido");

        client.publish('led2', 'on', (error) => {
          console.log(error || 'Mensaje enviado!!!')
        })
      }else{
        console.log("Apagado");
        client.publish('led2', 'off', (error) => {
          console.log(error || 'Mensaje enviado!!!')
        })
      }
    }








    /*
    ******************************
    ****** CONEXION  *************
    ******************************
    */

    // connect options
    const options = {
      connectTimeout: 4000,

      clientId: 'emqx124',
      username: 'web_client',
      password: '1212',

      keepalive: 60,
      clean: true,
    }

    var connected = false;

    // WebSocket connect url
    const WebSocket_URL = 'wss://cinyciot.com:8094/mqtt'


    const client = mqtt.connect(WebSocket_URL, options)


    client.on('connect', () => {
        console.log('Mqtt conectado por WS! Exito!')

        client.subscribe('values', { qos: 0 }, (error) => {
          if (!error) {
            console.log('Suscripción exitosa!')
          }else{
            console.log('Suscripción fallida!')
          }
        })

        // publish(topic, payload, options/callback)
        client.publish('fabrica', 'esto es un verdadero éxito', (error) => {
          console.log(error || 'Mensaje enviado!!!')
        })
    })

    client.on('message', (topic, message) => {
      console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString())
      process_msg(topic, message);
    })

    client.on('reconnect', (error) => {
        console.log('Error al reconectar', error)
    })

    client.on('error', (error) => {
        console.log('Error de conexión:', error)
    })







    </script>

   </body>
</html>
