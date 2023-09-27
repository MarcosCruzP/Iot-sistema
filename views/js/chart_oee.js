Chart.defaults.global.defaultFontColor = 'white';
var ctx = document.getElementById('myChart1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Maquina1', 'Maquina2', 'Maquina3', 'Maquina4', 'Maquina5'],
        datasets: [{
            type: 'bar',
            label: 'Disponibilidad %',
            backgroundColor: 'rgb(0, 255, 255)',
            borderColor: 'rgb(0, 255, 255)',
            data: [0,0,0,0,0],
            fill: 'false'
        },{
            type: 'bar',
            label: 'Calidad %',
            backgroundColor: 'rgb(139,0,139)',
            borderColor: 'rgb(116, 24, 130 ,0.8)',
            data: [0,0,0,0,0],
            fill: 'false'
        },{
            type: 'bar',
            label: 'Productividad %',
            backgroundColor: 'rgb(22, 139, 67)',
            borderColor: 'rgb(22, 139, 67)',
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
                    ctx.fillText(data, bar._model.x, bar._model.y - 5);
                });
            });
        }
    },
    scales:{
        yAxes:[{ ticks:{ beginAtZero:true
                } }]  },

          title: {
            display: true,
            text: 'Datos en % del OEE'
          }
        }
});
 setInterval(function(){

  chart.data.datasets[0].data = [ $dispo_m1, $dispo_m2, $dispo_m3, $dispo_m1, $dispo_m2];
  chart.data.datasets[1].data = [ $calid_m1, $calid_m2, $calid_m3, $calid_m1, $calid_m2];
  chart.data.datasets[2].data = [ $prod_m1, $prod_m2, $prod_m3, $prod_m1, $prod_m2];
  chart.update();

}, 500);



///////////////////////////////////////////////////////  grafica 2 //////////////////////////////////////////////////////////////////////////


var ctx = document.getElementById('myChart2').getContext('2d');
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
                    ctx.fillText(data, bar._model.x + 20, bar._model.y + 6);
                });
            });
        }
    },

          title: {
            display: true,
            text: 'OEE '
          }
        }
});
 setInterval(function(){

  chart1.data.datasets[0].data = [$OEE_m1,$OEE_m2,$OEE_m3,$OEE_m1,$OEE_m2];
  chart1.update();

}, 500);