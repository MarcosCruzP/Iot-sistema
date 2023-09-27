var mysql = require('mysql');
var mqtt = require('mqtt');



var con = mysql.createConnection({
  host: "cinyciot.com",
  user: "admin_cinvyciot",
  password: "contrDBinfoGlobTraficRegUsrMpC",
  database: "admin_IoTusers"
});

var options = {
  port: 1883,
  host: 'cinyciot.com',
  clientId: 'access_control_server_' + Math.round(Math.random() * (0- 10000) * -1),
  username: 'web_client',
  password: '121212',
  keepalive: 60,
  reconnectPeriod: 1000,
  protocolVersions: 'MQIsdp',
  clean: true,
  encoding: 'utf8'
}

var client = mqtt.connect("mqtt://cinyciot.com", options);

/// se realiza la Conexion
client.on('connect', function(){
  console.log("Conexion MQTT exitosa");
  client.subscribe('+/#', function(err){
    console.log("Subscripcion exitosa");
  });
});


var cantidad1=0;
 var cantidad2=0;
 var cantidad3=0;
var cn1_e1=0;
var cn1_e2=0;
var cn1_e=0;
var registro=0, act=0, reg = 0 ,reg1 = 0,reg5 = 0,reg4 = 0;
var crt;
var cn1_p2;
var cn1_p1;
var cn1_p;
var time, prom, promtime;
var control, control1, control2;
var fecha;
var inittur1;
var inittur2;
var endttur1;
var endttur2;
var registro2, registro1;
var turn = "TurnoC";
var rt;
var rt3
var rt4;
var dateReal;
var maq1_a=0, maq2_a=0, maq3_a=0, maq4_a=0, maq5_a=0;
var time1 =0,time2 =0,time3 =0,time4 =0,time5 =0;
var a = 0, b=0;
var semana=42;
var maq1_b=0, maq2_b=0, maq3_b=0, maq4_b=0, maq5_b=0;
var time1_a =0,time2_a=0,time3_a =0,time4_a =0,time5_a =0;
//  var separador = '"-"';

client.on('message', function(topic,message){

     if (topic == "Cinvyc/maq1/sens"){
       var msg = message.toString();
       var sp3 = msg.split(",");
       var cantid= sp3[0];
       var est3 = sp3[4];
       control = sp3[5];

    //   console.log(control);

      cantidad1 = parseFloat(cantid);
      cn1_e = parseFloat(est3);


}

 if (topic == "Cinvyc/maq2/sens"){
   var msg = message.toString();
   var sp2 = msg.split(",");
   var cantid1= sp2[0];
   var est2 = sp2[4];
    control1 = sp2[5];
    cantidad2 = parseFloat(cantid1);
    cn1_e2 = parseFloat(est2);
}

if (topic == "Cinvyc/maq3/sens"){
  var msg = message.toString();
  var sp1 = msg.split(",");
  var cantid1= sp1[0];
  var est1 = sp1[4];
  control2 = sp1[5];

   cantidad3 = parseFloat(cantid1);
   cn1_e1 = parseFloat(est1);
}

var actualizarHora = function(){
		 fecha = new Date(),
			hora = fecha.getHours(),
			minutos = fecha.getMinutes(),
			segundos = fecha.getSeconds(),
			diaSemana = fecha.getDay(),
			day = fecha.getDate(),
      dia = day.toString(),
			mes = fecha.getMonth() + 1,
			year = fecha.getFullYear();

      if (mes < 10) {
         mes = "0"+mes;
      }

      if (diaSemana == 0 ) {
        var rt5 =  reg5 + 1;
        }else {
          reg5 = 0;
        }
          if ( rt5 == 1) {
        semana++;
        reg5 = 5;
      }


	};

actualizarHora();
var intervalo = setInterval(actualizarHora,1000);
dateReal = year.toString() ;



con.query("SELECT * FROM `turnos`  WHERE `turn_h1` ", function (err,result,fields){
   if (err) throw err;
   if (result.length>0){
     inittur1 =  result[0]['turn_h1'];
     inittur2 =  result[1]['turn_h1'];
     endttur1 =  result[0]['turn_h2'];
     endttur2 =  result[1]['turn_h2'];
   }
});

console.log(turn);
//home/admin/web/cinyciot.com/public_html/node#

if (inittur1 == hora ) {
  var rt2 =  reg1 + 1;
  }else {
    reg1 = 0;
  }
    if ( rt2 == 1) {
  client.publish("Turno","0");
  reg1 = 5;
}

if (endttur1 == hora ) {
  var rt10 =  reg + 1;
  }else {
    reg = 0;
    b=0;
    maq1_a = 0;
    maq2_a = 0;
    maq3_a = 0;
    maq4_a = 0;
    maq5_a = 0;
    time1=0;
    time2=0;
    time3=0;
    time4=0;
    time5=0;}
    console.log(rt10 );
    if ( rt10 == 1) {
      var long1=0;

      con.query('SELECT * FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoA"], function (err,result,fields){
         if (err) throw err;
         if (result.length>0){
           var d1 =  result[b]['ef_maq1'];
           maq1_a = maq1_a + d1;
           maq1_a = maq1_a;
           var d2 =  result[b]['ef_maq2'];
           maq2_a = maq2_a +d2;
           maq2_a = maq2_a;
           var d3 =  result[b]['ef_maq3'];
           maq3_a = maq3_a + d3;
           maq3_a = maq3_a;
           var d4 =  result[b]['ef_maq4'];
           maq4_a = maq4_a + d4;
           maq4_a = maq4_a;
           var d5 =  result[b]['ef_maq5'];
           maq5_a = maq5_a + d5;
           maq5_a = maq5_a;

           time1 = result[b]['ef_timem1'];
           time1 = time1;
           time2 = result[b]['ef_timem2'];
           time2 = time2;
           time3 = result[b]['ef_timem3'];
           time3 = time3;
           time4 = result[b]['ef_timem4'];
           time4 = time4;
           time5 = result[b]['ef_timem5'];
           time5 = time5;
           b++;
           long1 = result.length;
            console.log(b);
           if (b == long1) {
             con.query('DELETE FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoA"], function (err, result) {
                if (err) throw err;
                console.log("Number of records deleted: " + result.affectedRows);
              });

              var trnt = "'TurnoA'";
              var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq1`, `ef_maq2`, `ef_maq3`,`ef_maq4`, `ef_maq5`, `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+maq1_a+ ", " +maq2_a+ ", "+maq3_a+ ", " +maq4_a+ ", " +maq5_a+ ", " + trnt + ", " +time1+ ", " +time2+ ", " +time3+ ", " +time4+  ", " +time5+ ", "  +semana+ ", "  +mes+  ", " +dia+  ");";
                  con.query(query, function (err, result,fields){
                    if (err) throw err;
                  });


             client.publish("Turno","0");
             reg = 8;
           }
         }
      });

}

console.log("turna  "+b);
if (endttur2 == hora ) {
  var rt12 =  reg4 + 1;
  }else {
    reg4 = 0;
    a=0;
    maq1_b = 0;
    maq2_b = 0;
    maq3_b = 0;
    maq4_b = 0;
    maq5_b = 0;
    time1_a=0;
    time2_a=0;
    time3_a=0;
    time4_a=0;
    time5_a=0;}
    if (rt12 == 1) {
      var long=0;
      con.query('SELECT * FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoB"], function (err,result,fields){
         if (err) throw err;
         if (result.length>0){
           var d1_b =  result[a]['ef_maq1'];
           maq1_b = maq1_b + d1_b;
           maq1_b = maq1_b;
           var d2_b =  result[a]['ef_maq2'];
           maq2_b = maq2_b + d2_b;
           maq2_b = maq2_b;
           var d3_b =  result[a]['ef_maq3'];
           maq3_b = maq3_b + d3_b;
           maq3_b = maq3_b;
           var d4_b =  result[a]['ef_maq4'];
           maq4_b = maq4_b + d4_b;
           maq4_b = maq4_b;
           var d5_b =  result[a]['ef_maq5'];
           maq5_b = maq5_b + d5_b;
           maq5_b = maq5_b;

           time1_a = result[a]['ef_timem1'];
           time1_a = time1_a;
           time2_a = result[a]['ef_timem2'];
           time2_a = time2_a;
           time3_a = result[a]['ef_timem3'];
           time3_a = time3_a;
           time4_a = result[a]['ef_timem4'];
           time4_a = time4_a;
           time5_a = result[a]['ef_timem5'];
           time5_a = time5_a;
           a++;
           long = result.length;

           if (a == long) {
             con.query('DELETE FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoB"], function (err, result) {
                if (err) throw err;
                console.log("Number of records deleted: " + result.affectedRows);
              });
             var trnt2 = "'TurnoB'";
             console.log(maq3_a);

              var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq1`, `ef_maq2`, `ef_maq3`,`ef_maq4`, `ef_maq5`, `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+maq1_b+ ", " +maq2_b+ ", "+maq3_b+ ", " +maq4_b+ ", " +maq5_b+ ", " + trnt2 + ", " +time1_a+ ", " +time2_a+ ", " +time3_a+ ", " +time4_a+  ", " +time5_a+ ", "  +semana+ ", "  +mes+  ", " +dia+  ");";
                  con.query(query, function (err, result,fields){
                    if (err) throw err;
                  });


             client.publish("Turno","0");
             reg4 = 5;
           }
         }
      });
}

if (hora >= inittur1  && endttur1  >  hora) {
  turn = "'TurnoA'";
  }

  if (hora >= endttur1 &&  hora  <  endttur2 ) {
    turn = "'TurnoB'";
    }
    else if (hora > endttur2 && inittur1  >  hora ) {
      turn = "TurnoC";
    }
//console.log("turnb  "+a);


if(control == "1" && hora >= inittur1 && hora < endttur2 ){
rt =  registro + 1;
}else {
 registro = 0;
  rt =0;
}

if(control1 == "1" && hora >= inittur1 && hora < endttur2){
rt3 =  registro1 + 1;
}else {
  registro1 = 0;
  rt3 =0;
}

if(control2 == "1" && hora >= inittur1 && hora < endttur2){
rt4 =  registro2 + 1;
}else {
  registro2 = 0;
  rt4 =0;
}

  if ( rt == 1) {
     var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq1`, `ef_maq4` , `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+ cantidad1+ ", " +cantidad1+ ", " + turn + ", " +cn1_e+ ", " +cn1_e2+ ", " +cn1_e1+ ", " +cn1_e+  ", " +cn1_e2+ ", "  +semana+ ", "  +mes+  ", " +dia+ ");";
         con.query(query, function (err, result,fields){
           if (err) throw err;
         });
        console.log("si jala 1....");
   registro = 5;
  }

  if ( rt3 == 1) {
          var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq2`, `ef_maq5` , `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+ cantidad2+ ", " +cantidad2+ ", " + turn + ", " +cn1_e+ ", " +cn1_e2+ ", " +cn1_e1+ ", " +cn1_e+  ", " +cn1_e2+ ", "  +semana+ ", "  +mes+  ", " +dia+ ");";
         con.query(query, function (err, result,fields){
             if (err) throw err;
           });
            console.log("si jala 2....");
    registro1 = 5;
  }

  if ( rt4 == 1) {
       var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq3`, `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5` , `ef_sem`, `ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+ cantidad3+ ", " + turn + ", " +cn1_e+ ", " +cn1_e2+ ", " +cn1_e1+ ", " +cn1_e+  ", " +cn1_e2+ ", "  +semana+ ", " +mes+  ", " +dia+  ");";
       con.query(query, function (err, result,fields){
             if (err) throw err;
           });
            console.log("si jala 2....");
    registro2 = 5;
  }

});


//////////************************************************************************************************************************/////////////////////////////////////////////Seccion en ausencia de recepcion de datos //////////////////////////////////////////////////////////////////////////////////*************************************************************************************************************/////////

var actualizarHora1 = function(){
		 fecha1 = new Date(),
			hora1 = fecha1.getHours(),
			minutos1 = fecha1.getMinutes(),
			segundos1 = fecha1.getSeconds(),
			diaSemana1 = fecha1.getDay(),
			day1 = fecha1.getDate(),
      dia1 = day1.toString(),
			mes1 = fecha1.getMonth() + 1,
			year1 = fecha1.getFullYear();

      if (mes1 < 10) {
         mes1 = "0"+mes1;
      }

      if (diaSemana1 == 0 ) {
        var rt5 =  reg5 + 1;
        }else {
          reg5 = 0;
        }
          if ( rt5 == 1) {
        semana++;
        reg5 = 5;
      }


	};


actualizarHora1();
var intervalo1 = setInterval(actualizarHora1,1000);
//console.log(turn);
console.log(hora1);


con.query("SELECT * FROM `turnos`  WHERE `turn_h1` ", function (err,result,fields){
   if (err) throw err;
   if (result.length>0){
     inittur1 =  result[0]['turn_h1'];
     inittur2 =  result[1]['turn_h1'];
     endttur1 =  result[0]['turn_h2'];
     endttur2 =  result[1]['turn_h2'];
   }
});

console.log(turn);
//home/admin/web/cinyciot.com/public_html/node#

if (inittur1 == hora1) {
  var rt2 =  reg1 + 1;
  }else {
    reg1 = 0;
  }
    if ( rt2 == 1) {
  client.publish("Turno","0");
  reg1 = 5;
}


if (hora1 >= inittur1  && endttur1  >  hora1) {
  turn = "'TurnoA'";
  }

  if (hora1 >= endttur1 && endttur2  >  hora1  ) {
    turn = "'TurnoB'";
    }
    else if (hora1 > endttur2 && inittur1  >  hora1 ) {
      turn = "TurnoC";
    }



if (endttur1 == hora1) {
  var rt10 =  reg + 1;
  }else {
    reg = 0;
    b=0;
    maq1_a = 0;
    maq2_a = 0;
    maq3_a = 0;
    maq4_a = 0;
    maq5_a = 0;
    time1=0;
    time2=0;
    time3=0;
    time4=0;
    time5=0;}
    console.log(rt10 );
    if ( rt10 == 1) {
      var long1=0;

      con.query('SELECT * FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoA"], function (err,result,fields){
         if (err) throw err;
         if (result.length>0){
           var d1 =  result[b]['ef_maq1'];
           maq1_a = maq1_a + d1;
           maq1_a = maq1_a;
           var d2 =  result[b]['ef_maq2'];
           maq2_a = maq2_a +d2;
           maq2_a = maq2_a;
           var d3 =  result[b]['ef_maq3'];
           maq3_a = maq3_a + d3;
           maq3_a = maq3_a;
           var d4 =  result[b]['ef_maq4'];
           maq4_a = maq4_a + d4;
           maq4_a = maq4_a;
           var d5 =  result[b]['ef_maq5'];
           maq5_a = maq5_a + d5;
           maq5_a = maq5_a;

           time1 = result[b]['ef_timem1'];
           time1 = time1;
           time2 = result[b]['ef_timem2'];
           time2 = time2;
           time3 = result[b]['ef_timem3'];
           time3 = time3;
           time4 = result[b]['ef_timem4'];
           time4 = time4;
           time5 = result[b]['ef_timem5'];
           time5 = time5;
           b++;
           long1 = result.length;
            console.log(b);
           if (b == long1) {
             con.query('DELETE FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoA"], function (err, result) {
                if (err) throw err;
                console.log("Number of records deleted: " + result.affectedRows);
              });

              var trnt = "'TurnoA'";
              var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq1`, `ef_maq2`, `ef_maq3`,`ef_maq4`, `ef_maq5`, `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+maq1_a+ ", " +maq2_a+ ", "+maq3_a+ ", " +maq4_a+ ", " +maq5_a+ ", " + trnt + ", " +time1+ ", " +time2+ ", " +time3+ ", " +time4+  ", " +time5+ ", "  +semana+ ", "  +mes+  ", " +dia+  ");";
                  con.query(query, function (err, result,fields){
                    if (err) throw err;
                  });


             client.publish("Turno","0");
             reg = 8;
           }
         }
      });

}

console.log("turna  "+b);
if (endttur2 == hora1 ) {
  var rt12 =  reg4 + 1;
  }else {
    reg4 = 0;
    a=0;
    maq1_b = 0;
    maq2_b = 0;
    maq3_b = 0;
    maq4_b = 0;
    maq5_b = 0;
    time1_a=0;
    time2_a=0;
    time3_a=0;
    time4_a=0;
    time5_a=0;}
    if (rt12 == 1) {
      var long=0;
      con.query('SELECT * FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoB"], function (err,result,fields){
         if (err) throw err;
         if (result.length>0){
           var d1_b =  result[a]['ef_maq1'];
           maq1_b = maq1_b + d1_b;
           maq1_b = maq1_b;
           var d2_b =  result[a]['ef_maq2'];
           maq2_b = maq2_b + d2_b;
           maq2_b = maq2_b;
           var d3_b =  result[a]['ef_maq3'];
           maq3_b = maq3_b + d3_b;
           maq3_b = maq3_b;
           var d4_b =  result[a]['ef_maq4'];
           maq4_b = maq4_b + d4_b;
           maq4_b = maq4_b;
           var d5_b =  result[a]['ef_maq5'];
           maq5_b = maq5_b + d5_b;
           maq5_b = maq5_b;

           time1_a = result[a]['ef_timem1'];
           time1_a = time1_a;
           time2_a = result[a]['ef_timem2'];
           time2_a = time2_a;
           time3_a = result[a]['ef_timem3'];
           time3_a = time3_a;
           time4_a = result[a]['ef_timem4'];
           time4_a = time4_a;
           time5_a = result[a]['ef_timem5'];
           time5_a = time5_a;
           a++;
           long = result.length;

           if (a == long) {
             con.query('DELETE FROM eficiencias WHERE ef_dia = ?  and ef_mes = ? and ef_turno = ?',[dia,mes, "TurnoB"], function (err, result) {
                if (err) throw err;
                console.log("Number of records deleted: " + result.affectedRows);
              });
             var trnt2 = "'TurnoB'";
             console.log(maq3_a);

              var query = "INSERT INTO `admin_IoTusers`.`eficiencias` (`ef_date1`,`ef_maq1`, `ef_maq2`, `ef_maq3`,`ef_maq4`, `ef_maq5`, `ef_turno`, `ef_timem1`, `ef_timem2`, `ef_timem3`, `ef_timem4`, `ef_timem5`, `ef_sem` ,`ef_mes`, `ef_dia`) VALUES (" +dateReal+ ", "+maq1_b+ ", " +maq2_b+ ", "+maq3_b+ ", " +maq4_b+ ", " +maq5_b+ ", " + trnt2 + ", " +time1_a+ ", " +time2_a+ ", " +time3_a+ ", " +time4_a+  ", " +time5_a+ ", "  +semana+ ", "  +mes+  ", " +dia+  ");";
                  con.query(query, function (err, result,fields){
                    if (err) throw err;
                  });


             client.publish("Turno","0");
             reg4 = 5;
           }
         }
      });
}











  con.connect(function(err){
  //  if (err) throw err;
  console.log("Conexion a MYSQL exitosa!!");
  /// hacemos la conulta
   //var query = "SELECT * FROM `turnos`";
});

// para mantener la sesió con mysql abierta
setInterval(function(){
  var query = 'SELECT 1 + 1 as result';
  con.query(query, function(err, result,fields){
    if (err) throw err;
  });
//  do_query(query);
}, 5000);
