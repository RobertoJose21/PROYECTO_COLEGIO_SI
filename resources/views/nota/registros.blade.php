<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros de Notas</title>
    
</head>

<body>
    
    <div class="container-fluid">
    <h1 style="text-align: center">REGISTROS  de NOTAS</h1>
    <table style="width:100%">
        
        <tr><td><b>ID CURSO: </b>{{$curso->idcurso}}</td></tr>
       <tr><td ><b>CURSO: </b>{{$curso->curso}} <br></td>  </tr>
       <tr><td ><b>NIVEL: </b>{{$curso->grado->nivel->nivel}} <br></td>  </tr>
       <tr><td ><b>GRADO: </b>{{$curso->grado->grado}} <br></td>  </tr>
       <tr> <td>CAPACIDADES:</td></tr>
    <tr><td> <b>C1 :</b> {{$notas[0]->capacidad}}</td> <td> <b>{{' '}}C2 :</b> {{$notas[1]->capacidad}}</td> <td> <b>{{' '}}C3 :</b> {{$notas[2]->capacidad}}</td></tr>
            
       <tr><td ><b>LISTA DE ALUMNOS: </b> <br></td>  </tr>
       
       <div class="container-fluid">
    <table style="align-content: center" border="1">
        <thead>
        <tr>
            <td>ALUMNO</td>
            <td><b>C1</b> </td>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P1</b> </td>
            <td><b>C2</b></td>  
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P2</b></td>
            <td><b>C3</b></td>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P3</b></td>
            <td><b>PF</b></td>

        </tr>
    </thead>
    <tbody>
        @foreach($alumno as $itemalumno)
        <tr> 
        <td> {{$itemalumno->apellidos}},{{$itemalumno->nombres}} </td>
            @foreach($notas as $itemnota)
            @if($itemalumno->idmatricula==$itemnota->idmatricula)
            <td></td>
            <td> {{$itemnota->nota1}} </td> 
            <td> {{$itemnota->nota2}} </td> 
            <td> {{$itemnota->nota3}} </td> 
            <td><b>{{$itemnota->promedio}}</b>  </td> 
            
            @endif
            
            @endforeach
        </tr>
        @endforeach

    </tbody>
    </table>
       
</div>
</div>
   



</body>
</html>