@if (!empty($charts) && $charts == 'true')
<script>
  "use strict";

  const primary = '#6993FF';
  const success = '#1BC5BD';
  const info = '#8950FC';
  const warning = '#FFA800';
  const danger = '#F64E60';

  function generateBubbleData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

  function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = 'w' + (i + 1).toString();
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      series.push({
        x: x,
        y: y
      });
      i++;
    }
    return series;
  }

  var ChartEXILEDNONAME = function () {
    var _exilednoname = function () {
      const apexChart = "#charts";
      var created = [{{ chart_created($model) }}];
      var deleted = [{{ chart_deleted($model) }}];
      var updated = [{{ chart_updated($model) }}];
      var options = {
        series: [
          { name: '{{ __("default.label.created") }}', data: created },
          { name: '{{ __("default.label.deleted") }}', data: deleted },
          { name: '{{ __("default.label.updated") }}', data: updated },
        ],
        chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'straight'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        colors: [success, danger, warning]
      };
      var chart = new ApexCharts(document.querySelector(apexChart), options);
      chart.render();
    }
    return {
      init: function () {
        _exilednoname();
      }
    };
  }();
  jQuery(document).ready(function () {
    ChartEXILEDNONAME.init();
  });
</script>
@endif
