<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libreta de Notas</title>
</head>
<body>
    

    <h1 style="text-align: center">Libreta de Notas</h1>
    <table style="width:100%">
        <tr><td><b>Numero de Matricula: </b>{{$matricula->idmatricula}}</td></tr>
       <tr><td style="text-align: right"><b>Fecha Matricula: </b>{{$matricula->fecha}} <br></td>  </tr>
        <tr><td><b>Nivel Educativo: </b>{{$matricula->seccion->grado->nivel->nivel}}</td></tr>
        <tr><td><b>Grado: </b>{{$matricula->seccion->grado->grado}}</td></tr>
        <tr><td><b>Seccion: </b>{{$matricula->seccion->seccion}}</td></tr>
        <tr><td ><b>Periodo: </b>{{$matricula->periodo->periodo}}</td></tr>

        <tr><td style="text-align: right"><b>Alumno: </b>{{$matricula->alumno->apellidos}} <br>
         {{$matricula->alumno->nombres}}    
     </td> <br></tr>
     
     <tr><td style="text-align: center"><b> Firma Director:Juan Jose Perez Rodriguez </b> </td></tr>
     <tr><td style="text-align: center"><b>  </b> <img src="img/firma.png" width="20%" alt=""></td></tr>
   
    </table>



</body>
</html>