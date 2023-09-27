Chart.defaults.global.defaultFontColor = 'white';
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Dato 1', 'Dato 2', 'Dato 3', 'Dato 4', 'Dato 5'],
        datasets: [{
            type: 'line',
            label: 'Metros por minuto',
            backgroundColor: 'cyan',
            borderColor: 'cyan',
            data: [5,84,32,45,12],
            fill: 'false'
        },{
            type: 'bar',
            label: 'Centimeros por minuto',
            backgroundColor: 'rgb(10, 25, 84)',
            borderColor: 'rgb(10, 25, 84)',
            data: [5,84,32,45,12]
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
          legend: false,
          
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
                    ctx.fillText(data, bar._model.x + 15, bar._model.y + 15);
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

  chart.data.datasets[0].data = [5,84,32,45,12];
  chart.data.datasets[1].data = [5,84,32,45,12];
  chart.update();

}, 500);

/******************************************************* Gragica 2 ****************************************************/ 

Chart.defaults.global.defaultFontColor = 'white';
var ctx = document.getElementById('myChart1').getContext('2d');
var chart1 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            label: 'unidad/minuto',
            backgroundColor: 'rgb(33, 177, 93,0.8)',
            borderColor: 'rgb(255,255,255)',
            data: [5,8,4,6,2],
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
                    ctx.fillText(data, bar._model.x + 15, bar._model.y -6);
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

  chart1.data.datasets[0].data = [52,64,31,45,28];
  chart1.update();

}, 500);