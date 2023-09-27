///////////////////////////////////////////////////////  grafica 1 //////////////////////////////////////////////////////////////////////////

Chart.defaults.global.defaultFontColor = 'white';
var ctx = document.getElementById('myChart').getContext('2d');
var chart2 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            label: 'unidad/minuto',
            backgroundColor: 'rgb(12, 68, 110)',
            borderColor: 'rgb(0, 255, 255)',
            data: [0,0,0,0,0],
            fill: 'false'
        }]
    },

    // Configuration options go here
   options: {
          elements: {
            rectangle: {
              borderWidth: 2,
            }
          },
            scales: {
              xAxes: [{
                ticks: {
                  beginAtZero:true,
                }
              }]
            },
            responsive: true,
          events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
            labels:{
                reverse: true,
              },
            
          legend: {
            position: 'bottom',
          },
          
      animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x - 15, bar._model.y + 6);
                });
            });
        }
    },

          title: {
            display: true,
            text: 'Datos promedio de unidad/minuto planta emulada Cinvyc'
          }
        }
});
 setInterval(function(){

  chart2.data.datasets[0].data = [$d_cant1, $d_cant2,$d_cant3, $d_cant4,$d_cant5];
  chart2.update();

}, 500);


///////////////////////////////////////////////////////  grafica 2 //////////////////////////////////////////////////////////////////////////


var ctx = document.getElementById('myChart1').getContext('2d');
var chart1 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            label: 'Revoluciones por minuto',
            backgroundColor: 'rgb(12, 68, 110)',
            borderColor: 'rgb(0, 255, 255)',
            data: [0,0,0,0,0],
            fill: 'false'
        }]
    },

    // Configuration options go here
   options: {
          elements: {
            rectangle: {
              borderWidth: 2,
            }
          },
            scales: {
              xAxes: [{
                ticks: {
                  reverse: true,
                  beginAtZero:true,
                }
              }]
            },
            responsive: true,
          events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
            labels:{
                reverse: true,
              },
            
          legend: {
            position: 'bottom',
          },
          
      animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x + 15, bar._model.y + 6);
                });
            });
        }
    },

          title: {
            display: true,
            text: 'Datos promedio de RPMS planta emulada Cinvyc'
          }
        }
});
 setInterval(function(){

  chart1.data.datasets[0].data = [$d_rpm1, $d_rpm1, $d_rpm3, $d_rpm4, $d_rpm5];
  chart1.update();

}, 500);


///////////////////////////////////////////////////////  grafica 3 //////////////////////////////////////////////////////////////////////////

var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            type: 'line',
            label: 'Metros por minuto',
            backgroundColor: 'rgb(0, 255, 255)',
            borderColor: 'rgb(0, 255, 255)',
            data: [0,0,0,0,0],
            fill: 'false'
        },{
            type: 'bar',
            label: 'Centimeros por minuto',
            backgroundColor: 'rgb(139,0,139)',
            borderColor: 'rgb(116, 24, 130 ,0.8)',
            data: [0,0,0,0,0]
        }]
    },

    // Configuration options go here
   options: {
          elements: {
            rectangle: {
              borderWidth: 2,
            }
          },
            responsive: true,
            events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
          legend: {
            position: 'bottom',
          },
          
      animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';
                ctx.color ='white';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x - 15, bar._model.y - 5);
                });
            });
        }
    },
    scales:{
        yAxes:[{ ticks:{ beginAtZero:true
                } }]  },

          title: {
            display: true,
            text: 'Datos M y CM por minuto planta emulada Cinvyc'
          }
        }
});
 setInterval(function(){

  chart.data.datasets[0].data = [$d_mt1,$d_mt2, $d_mt3, $d_mt4, $d_mt5];
  chart.data.datasets[1].data = [$d_cm1, $d_cm2,$d_cm3, $d_cm4, $d_cm5];
  chart.update();

}, 500);






 ///////////////////////////////////////////////////////  grafica 6 //////////////////////////////////////////////////////////////////////////
var ctx = document.getElementById('myChart5').getContext('2d');
var chart5 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            label: 'RPMS tiempo real',
            backgroundColor: 'rgb(0, 255, 255)',
            borderColor: 'rgb(12, 68, 110)',
            data: [0,0,0,0,0],
            
        }]
    },

    // Configuration options go here
   options: {
          elements: {
            rectangle: {
              borderWidth: 2,
            }
          },
            scales: {
              xAxes: [{
                ticks: {
                  beginAtZero:true,
                }
              }]
            },
            responsive: true,
          events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
            labels:{
                reverse: true,
              },
            
          legend: {
            position: 'bottom',
          },
          
      animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x + 10, bar._model.y - 2);
                });
            });
        }
    },

          title: {
            display: true,
            text: 'Datos en tiempo real de sensores RPM planta emulada Cinvyc'
          }
        }
});
 setInterval(function(){

  chart5.data.datasets[0].data = [$M1_sen2, $M2_sen2, $M3_sen2, $M4_sen2, $M5_sen2];
  chart5.update();

}, 500);


 ///////////////////////////////////////////////////////  grafica 7 //////////////////////////////////////////////////////////////////////////

var ctx = document.getElementById('myChart6').getContext('2d');
var chart6 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            label: 'unidad/minuto',
            backgroundColor: 'rgb(0, 255, 255)',
            borderColor: 'rgb(12, 68, 110)',
            data: [0,0,0,0,0],

        }]
    },

    // Configuration options go here
   options: {
          elements: {
            rectangle: {
              borderWidth: 2,
            }
          },
            scales: {
              xAxes: [{
                ticks: {
                  beginAtZero:true,
                }
              }]
            },
            responsive: true,
          events: false,
            tooltips: {
                enabled: false
            },
            hover: {
                animationDuration: 0
            },
            labels:{
                reverse: true,
              },
            
          legend: {
            position: 'bottom',
          },
          
      animation: {
        duration: 1,
        onComplete: function () {
            var chartInstance = this.chart,
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                meta.data.forEach(function (bar, index) {
                    var data = dataset.data[index];                            
                    ctx.fillText(data, bar._model.x + 10, bar._model.y - 6);
                });
            });
        }
    },

          title: {
            display: true,
            text: 'Datos unidad/minuto planta emulada Cinvyc'
          }
        }
});
 setInterval(function(){

  chart6.data.datasets[0].data = [$M1_sen1, $M2_sen1, $M3_sen1, $M4_sen1, $M5_sen1];
  chart6.update();

}, 500);
