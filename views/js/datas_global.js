 /*
******************************
****** PROCESOS  *************
******************************
*/
function update_proms_m1(promed, promed1, promed2, promed3){
  $("#m1_prom1").html(promed);
  $("#m1_prom2").html(promed1);
  $("#m1_prom3").html(promed2);
  $("#m1_prom4").html(promed3);
  $d_cant1 = promed;
  $d_rpm1 = promed1;
  $d_mt1 = promed2;
  $d_cm1 = promed3;
   console.log($d_cant1);

   if (promed== "2147483647") {
     $("#cant_sens1").html("Calc..");
     $d_cant1 = "0";
     $("#RPM_sens1").html("Calc..");
     $d_rpm1 = "0";
   }
}

function update_proms_m2(promed, promed1, promed2, promed3){
    $("#m2_prom1").html(promed);
    $("#m2_prom2").html(promed1);
    $("#m2_prom3").html(promed2);
    $("#m2_prom4").html(promed3);
    $d_cant2 = promed;
    $d_rpm2 = promed1;
    $d_mt2 = promed2;
    $d_cm2 = promed3;
    if (promed== "2147483647") {
      $("#cant_sens2").html("Calc..");
      $d_cant2 = "0";
      $("#RPM_sens2").html("Calc..");
      $d_rpm2 = "0";
    }
}

function update_proms_m3(promed, promed1, promed2, promed3){
  $("#m3_prom1").html(promed);
  $("#m3_prom2").html(promed1);
  $("#m3_prom3").html(promed2);
  $("#m3_prom4").html(promed3);
  $d_cant3 = promed;
  $d_rpm3 = promed1;
  $d_mt3 = promed2;
  $d_cm3 = promed3;
  if (promed== "2147483647") {
    $("#cant_sens3").html("Calc..");
    $d_cant3 = "0";
    $("#RPM_sens3").html("Calc..");
    $d_rpm3 = "0";
  }
}

function update_proms_m4(promed, promed1, promed2, promed3){
  $("#m4_prom1").html(promed);
  $("#m4_prom2").html(promed1);
  $("#m4_prom3").html(promed2);
  $("#m4_prom4").html(promed3);
  $d_cant4 = promed;
  $d_rpm4 = promed1;
  $d_mt4 = promed2;
  $d_cm4 = promed3;
  if (promed== "2147483647") {
    $("#cant_sens4").html("Calc..");
    $d_cant4 = "0";
    $("#RPM_sens4").html("Calc..");
    $d_rpm4 = "0";
  }
}

function update_proms_m5(promed, promed1, promed2, promed3){
 $("#m5_prom1").html(promed);
 $("#m5_prom2").html(promed1);
 $("#m5_prom3").html(promed2);
 $("#m5_prom4").html(promed3);
  $d_cant5 = promed;
  $d_rpm5 = promed1;
  $d_mt5 = promed2;
  $d_cm5 = promed3;
  if (promed == "2147483647") {
    $("#cant_sens5").html("Calc..");
    $d_cant5 = "0";
    $("#RPM_sens5").html("Calc..");
    $d_rpm5 = "0";
  }
}

function update_sens_m1(promed, promed1, promed2, promed3){
  $("#maq1_sens1").html(promed);
  $("#maq1_sens2").html(promed1);
  $("#maq1_sens3").html(promed2);
  $("#maq1_sens4").html(promed3);
  $M1_sen1 = promed;
  $M1_sen2 = promed1;
  $M1_sen3 = promed2;
  $M1_sen4 = promed3;
}

function update_sens_m2(promed, promed1, promed2, promed3){
  $("#maq2_sens1").html(promed);
  $("#maq2_sens2").html(promed1);
  $("#maq2_sens3").html(promed2);
  $("#maq2_sens4").html(promed3);
  $M2_sen1 = promed;
  $M2_sen2 = promed1;
  $M2_sen3 = promed2;
  $M2_sen4 = promed3;
}

function update_sens_m3(promed, promed1, promed2, promed3){
  $("#maq3_sens1").html(promed);
  $("#maq3_sens2").html(promed1);
  $("#maq3_sens3").html(promed2);
  $("#maq3_sens4").html(promed3);
  $M3_sen1 = promed;
  $M3_sen2 = promed1;
  $M3_sen3 = promed2;
  $M3_sen4 = promed3;
}

function update_sens_m4(promed, promed1, promed2, promed3){
  $("#maq4_sens1").html(promed);
  $("#maq4_sens2").html(promed1);
  $("#maq4_sens3").html(promed2);
  $("#maq4_sens4").html(promed3);
  $M4_sen1 = promed;
  $M4_sen2 = promed1;
  $M4_sen3 = promed2;
  $M4_sen4 = promed3;
}
function update_sens_m5(promed, promed1, promed2, promed3){
  $("#maq5_sens1").html(promed);
  $("#maq5_sens2").html(promed1);
  $("#maq5_sens3").html(promed2);
  $("#maq5_sens4").html(promed3);
  $M5_sen1 = promed;
  $M5_sen2 = promed1;
  $M5_sen3 = promed2;
  $M5_sen4 = promed3;
}

update_proms_m1("0", "0", "0", "0");
update_proms_m2("0", "0", "0", "0");
update_proms_m3("0", "0", "0", "0");
update_proms_m4("0", "0", "0", "0");
update_proms_m5("0", "0", "0", "0");

function process_msg(topic, message){
  if (topic == "Cinvyc/maq1/proms"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
    var dis = sp[3];
    update_proms_m1(cantid, rpms, mets, dis);
  }

  if (topic == "Cinvyc/maq2/proms"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
      update_proms_m2(cantid, rpms, mets, dis);
  }

  if (topic == "Cinvyc/maq3/proms"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
    update_proms_m3(cantid, rpms, mets, dis);
  }
  if (topic == "Cinvyc/maq1/proms"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
    update_proms_m4(cantid, rpms, mets, dis);
  }
  if (topic == "Cinvyc/maq2/proms"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
    update_proms_m5(cantid, rpms, mets, dis);
  }

  if (topic == "Cinvyc/maq1/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
    update_sens_m1(cantid, rpms, mets, dis);
  }

  if (topic == "Cinvyc/maq2/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
     var rpms = sp[1];
    var mets = sp[2];
     var dis = sp[3];
    update_sens_m2(cantid, rpms, mets, dis);
  }
  if (topic == "Cinvyc/maq3/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var rpms = sp[1];
    var mets = sp[2];
    var dis = sp[3];
    update_sens_m3(cantid, rpms, mets, dis);
  }
  if (topic == "Cinvyc/maq1/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var rpms = sp[1];
    var mets = sp[2];
    var dis = sp[3];
    update_sens_m4(cantid, rpms, mets, dis);
  }
  if (topic == "Cinvyc/maq2/sens"){
    var msg = message.toString();
    var sp = msg.split(",");
    var cantid= sp[0];
    var rpms = sp[1];
    var mets = sp[2];
    var dis = sp[3];
    update_sens_m5(cantid, rpms, mets, dis);
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


