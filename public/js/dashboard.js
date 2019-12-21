var todayschart = [];
for (var i = 0; i < soldtodayitems.length; i++) {
    todayschart.push([soldtodayitems[i].food,parseInt(soldtodayitems[i].total)]);
}

$(document).ready( function () {
    $('input[name="datetimes"]').daterangepicker({
        timePicker: false,
        startDate: moment().subtract(7,"days"),
        endDate: moment(),
        locale: {
          format: 'DD-M-YYYY'
        }
    });

    $('input[name="datetimes"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-M-YYYY') + ' - ' + picker.endDate.format('DD-M-YYYY'));
        var startedAt = picker.startDate.format('YYYY-M-DD');
        var endedAt = (moment(picker.endDate.format('YYYY-M-DD'), "YYYY-M-DD").add(1, 'days')).format('YYYY-M-DD');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "http://127.0.0.1:8000/dashboardrefresh",
            type: "post",
            data: { start : startedAt, end : endedAt },
            success: function (response) {
                todayschart = [];
                for (var i = 0; i < response.jsdata.length; i++) {
                    todayschart.push([response.jsdata[i].food,parseInt(response.jsdata[i].total)]);
                }
                testChart();
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });

      $('input[name="datetimes"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

});

$(document).ready( function () {
    Highcharts.chart('foodcount', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Stacked column chart'
      },
      xAxis: {
        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Total fruit consumption'
        },
        stackLabels: {
          enabled: true,
          style: {
            fontWeight: 'bold',
            color: ( // theme
              Highcharts.defaultOptions.title.style &&
              Highcharts.defaultOptions.title.style.color
            ) || 'gray'
          }
        }
      },
      legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
          Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
      },
      tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
      },
      plotOptions: {
        column: {
          stacking: 'normal',
          dataLabels: {
            enabled: true
          }
        }
      },
      credits: {
        enabled: false
      },
      series: [{
        name: 'John',
        data: [5, 3, 4, 7, 2]
      }, {
        name: 'Jane',
        data: [2, 2, 3, 2, 1]
      }, {
        name: 'Joe',
        data: [3, 4, 4, 2, 5]
      }]
    });
});

$(document).ready( function () {
    Highcharts.chart('todayfoodcount', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Contents of Highsoft\'s weekly fruit delivery'
        },
        subtitle: {
            text: '3D donut in Highcharts'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Sold',
            data: [
                ['Bananas', 8],
                ['Kiwi', 3],
                ['Mixed nuts', 1],
                ['Oranges', 6],
                ['Apples', 8],
                ['Pears', 4],
                ['Clementines', 4],
                ['Reddish (bag)', 1],
                ['Grapes (bunch)', 1]
            ]
        }]
    });
});

$(document).ready( function () {
     testChart();
});

function testChart(){
    Highcharts.chart('test', {
       chart: {
           type: 'column'
       },
       title: {
           text: 'Today\'s Total Sold'
       },
       xAxis: {
           type: 'category'
       },
       yAxis: {
           title: {
               text: 'Total Sold'
           }

       },
       legend: {
           enabled: false
       },
       plotOptions: {
           series: {
               borderWidth: 0,
               dataLabels: {
                   enabled: true,
                   format: '{point.y:.0f}'
               }
           }
       },

       tooltip: {
           headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
           pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> items sold<br/>'
       },

       credits: {
         enabled: false
       },
       series: [
           {
               data: todayschart
           }
       ],
   });
}
