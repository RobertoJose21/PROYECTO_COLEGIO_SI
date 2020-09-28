@extends('layouts.plantilla')
@section('contenido')
<h3>Grafico </h3>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Secciones', 'Matriculados'],
          @foreach($registros as $reg)
              ['{{$reg->seccion}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'Cantidad de Alumnos por Secciones'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



@stop