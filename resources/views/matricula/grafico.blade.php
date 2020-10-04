@extends('layouts.plantilla')
@section('contenido')
<style>
  #outer {
    width: 100%;
    text-align: center;
    }
  
    #inner {
    display: inline-block;
    width: 50%
    }
</style>
<div class="container-fluid" >
  <h3 style="text-align: center">GRÁFICOS</h3>
  <div class="row">
      <div class="col-12">&nbsp;</div>
</div>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Alumnos', 'Matriculados'],
          @foreach($registros as $reg)
              ['{{$reg->grado}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'Cantidad de Alumnos por Grados',
          is3D: true,
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
            title: 'Cantidad de Alumnos por Periodo',
            pieStartAngle: 100,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

          chart.draw(data, options);
        }

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Alumnos', 'Matriculados'],
          @foreach($registrosTres as $reg)
              ['{{$reg->nivel}}',{{$reg->cantidad}}],  
          @endforeach          
        ]);

        var options = {
          title: 'Cantidad de Alumnos por Nivel',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
        }

    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">&nbsp;</div> 
        <div class="col-md-4">
          <div id="piechart" style="width: 900px; height: 400px;"></div>
          <div id="piechart2" style="width: 900px; height: 400px;"></div>
          <div  id="piechart3" style="width: 900px; height: 400px;"></div>
          
        </div>
        <div class="col-md-3">&nbsp;</div> 
      </div>
      <a href="/matricula" class="btn btn-info"> Volver</a>
      <div class="row"><div class="col-12">&nbsp;</div></div>   
  <div class="row"><div class="col-12">&nbsp;</div></div>
  <div class="row"><div class="col-12">&nbsp;</div></div>   
  <div class="row"><div class="col-12">&nbsp;</div></div> 

    </div>
  </body>
</html>

@stop