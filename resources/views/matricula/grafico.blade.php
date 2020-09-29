@extends('layouts.plantilla')
@section('contenido')
<h3>Grafico </h3>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Alumnos', 'Matriculados'],
          @foreach($registros as $reg)
              ['{{$reg->grado}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'Cantidad de Alumnos por Grados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Alumnos', 'Matriculados'],
          @foreach($registrosDos as $reg)
              ['{{$reg->periodo}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'Cantidad de Alumnos por Periodo'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
        }
    </script>
  </head>
  <body>
    <a href="/matricula" class="btn btn-back"> Volver</a>
    <div class="row">
      <div class="col md-7">
        <div id="piechart" style="width: 500px; height: 400px;"></div>
      </div>
      <div class="col md-7">
        <div id="piechart2" style="width: 500px; height: 400px;"></div>
      </div>
    </div>
  </body>
</html>

@stop