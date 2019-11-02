<script type="text/javascript">
    $(document).ready( function () {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: false,
            startDate: moment().subtract(7,"days"),
            endDate: moment(),
            locale: {
              format: 'DD-M-YYYY'
            }
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

</script>
