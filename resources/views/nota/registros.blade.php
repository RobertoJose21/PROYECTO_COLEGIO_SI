
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registros de Notas</title>
</head>
<body>
    

    <h1 style="text-align: center">REGISTROS  de NOTAS</h1>
    <table style="width:100%">
        
        <tr><td><b>ID CURSO: </b>{{$curso->idcurso}}</td></tr>
       <tr><td ><b>CURSO: </b>{{$curso->curso}} <br></td>  </tr>
       <tr><td ><b>NIVEL: </b>{{$curso->grado->nivel->nivel}} <br></td>  </tr>
       <tr><td ><b>GRADO: </b>{{$curso->grado->grado}} <br></td>  </tr>
            
       <tr><td ><b>LISTA DE ALUMNOS: </b> <br></td>  </tr>
       
    <table style="align-content: center" border="1">
        <tr>
            <td>ALUMNOS</td>
            <td>CAPACIDAD</td>
            <td>NOTA 1</td>
            <td>NOTA 2</td>
            <td>NOTA 3</td>
            <td>PROMEDIO</td>
            
        </tr>
        @php
            $cont=0
        @endphp
    @foreach($notas as $k )
        @php
            $cont=$cont+1;
        @endphp
        <tr>
        @if($cont==1)
        <td>{{$k->nombres.' '.$k->apellidos}}</td>
        @elseif($cont==2||$cont==3)
        <td></td>
        @endif
        <td>{{$k->capacidad}}</td>
        <td>{{$k->nota1}}</td>
        <td>{{$k->nota2}}</td>
        <td>{{$k->nota3}}</td>
        <td>{{$k->promedio}}</td>
        @if( $cont==3 )
           @php
                $cont=0;
            @endphp
             @endif
        </tr>
        
        @endforeach   
    </table>
       
     
  
   



</body>
</html>