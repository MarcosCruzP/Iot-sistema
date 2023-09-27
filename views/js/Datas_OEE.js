function update_proms_m1(promed, standar){
  var prod_real = parseFloat(promed);
  var time_oper = parseFloat(standar);

   

  var disp_m1 = ((time_oper)/9)*100;
  $dispo_m1 = disp_m1.toFixed(2);
  var calidad_m1 = 95;
  $calid_m1 = calidad_m1;

  var estandr_m1 = time_oper*(prod_real/time_oper)*1.07;
  var standar_m1 = estandr_m1.toFixed(2);

  var Productiv_cal = (prod_real/standar_m1)*100;
  $prod_m1 = Productiv_cal.toFixed(2); 
  
  var OEE_calc = ((Productiv_cal * $calid_m1 * $dispo_m1)/1000000)*100;
  $OEE_m1 = OEE_calc.toFixed(2);
  

   $("#time_opm1").html(time_oper);
   $("#prod_realm1").html(prod_real);
   $("#estandr_m1").html(standar_m1);
   $("#OEE_M1").html($OEE_m1);

   $("#time_opm4").html(time_oper);
   $("#prod_realm4").html(prod_real);
   $("#estandr_m4").html(standar_m1);
   $("#OEE_M4").html($OEE_m1);
}

function update_proms_m2(promed, standar){
  var prod_real = parseFloat(promed);
  var time_oper = parseFloat(standar);

   

  var disp_m2 = (time_oper/9)*100;
  $dispo_m2 = disp_m2.toFixed(2);
  console.log($dispo_m2);
  var calidad_m2 = 90.4;
  $calid_m2 = calidad_m2;

  var estandr_m2 = time_oper*(prod_real/time_oper)*1.09;
  var standar_m2 = estandr_m2.toFixed(2);

  var Prod_c = (prod_real/standar_m2)*100;
  $prod_m2 = Prod_c.toFixed(2);

  var OEE_calc = ((Prod_c * $calid_m2 * $dispo_m2)/1000000)*100;
  $OEE_m2 = OEE_calc.toFixed(2); 


   $("#time_opm2").html(time_oper);
   $("#prod_realm2").html(prod_real);
   $("#estandr_m2").html(standar_m2);
   $("#OEE_M2").html($OEE_m2);

   $("#time_opm5").html(time_oper);
   $("#prod_realm5").html(prod_real);
   $("#estandr_m5").html(standar_m2);
   $("#OEE_M5").html($OEE_m2);
}

function update_proms_m3(promed, standar){
  var prod_real = parseFloat(promed);
  var time_oper = parseFloat(standar);


  var disp_m3 = (time_oper/9)*100;
  $dispo_m3 = disp_m3.toFixed(2);
  var calidad_m3 = 93.2;
  $calid_m3 = calidad_m3;
  var estandr_m3 = time_oper*(prod_real/time_oper)*1.05;
  var standar_m3 = estandr_m3.toFixed(2);

  var Prod_c = (prod_real/standar_m3)*100;
  $prod_m3 = Prod_c.toFixed(2); 
  
  var OEE_calc = ((Prod_c * $calid_m3 * $dispo_m3)/1000000)*100;
  $OEE_m3 = OEE_calc.toFixed(2); 
 

   $("#time_opm3").html(time_oper);
   $("#prod_realm3").html(prod_real);
   $("#estandr_m3").html(standar_m3);
   $("#OEE_M3").html($OEE_m3);
}



function process_msg(topic, message){
  if (topic == "Cinvyc/maq1/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var est = sp[4];
    update_proms_m1(cantid, est);
  }

  if (topic == "Cinvyc/maq2/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var est = sp[4];
    update_proms_m2(cantid, est);
  }
  if (topic == "Cinvyc/maq3/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var est = sp[4];
    update_proms_m3(cantid, est);
  }


}



/*
******************************
****** CONEXION MQTT *************
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

//var connected = false;

// WebSocket connect url
const WebSocket_URL = 'wss://cinyciot.com:8094/mqtt'

const client = mqtt.connect(WebSocket_URL, options)


client.on('connect', () => {
  //  console.log('Mqtt conectado por WS! Exito!')

    client.subscribe('Cinvyc/#', { qos: 0 }, (error) => {
      if (!error) {
      //  console.log('Suscripción exitosa!')
      }else{
        console.log('Suscripción fallida!')
      }
    })

    // publish(topic, payload, options/callback)
    client.publish('fabrica', 'esto es un verdadero éxito', (error) => {
      //console.log(error || 'Mensaje enviado!!!')
    })
})

client.on('message', (topic, message) => {
  //console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString())
  process_msg(topic, message);
})

client.on('reconnect', (error) => {
    console.log('Error al reconectar', error)
})

client.on('error', (error) => {
    console.log('Error de conexión:', error)
})