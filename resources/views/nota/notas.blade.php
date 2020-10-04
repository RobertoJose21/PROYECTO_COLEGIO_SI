<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
       <title>Libreta de Notas</title>
</head>
<body>
    
<div class="container-fluid">
    <div class="container-fluid" style="background-image: url('img/logoInnova.png); background-size: contain;background-repeat: no-repeat; opacity:0.4;background-position: 50% 15%">
        <img src="img/centrotpf.png" alt="" width="10%" alt="" style="position:absolute;margin-left: 90%;">
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td colspan="1" style=" border: inset 0pt"><h3 class="text-center"> <b>LIBRETA DE NOTAS </b>  </h3></td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt">NUMERO DE MATRICULA : {{$matricula->idmatricula}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt">FECHA : {{$matricula->fecha}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt">NIVEL EDUCATIVO  : {{$matricula->seccion->grado->nivel->nivel}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt">GRADO : {{$matricula->seccion->grado->grado}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt">SECCIÓN : {{$matricula->seccion->seccion}}</td>
                    </tr>
                    <tr>  
                    <td  style=" border: inset 0pt">PERIODO : {{$matricula->periodo->periodo}}
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       ALUMNO : <b>{{$matricula->alumno->apellidos}},{{$matricula->alumno->nombres}}</b></td>
                    </tr>  
                </tbody>  
            </table>
        </div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div> 
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        <div class="row"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
      

        <div class="row" style="margin-left: 100px;margin-right: 230px" >
            <table class="table">
                <thead style="color: black;">  
                    <tr>
                        <th width="5" class="text-center" style=" border: inset 0pt"><b> Firma y Sello del Director: </b></th>  
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td style=" border: inset 0pt" ><img src="img/firma.png" width="50%" alt="" style="margin-left: 30%;" ></td>
                    </tr>
                </tbody>  
            </table>
        </div>        

    </div>
</div>
<!--  para las libretas  de los alumnos-->
    </table>
    <div style="page-break-after:always;"></div>
    <table style="width:100%" style="text-align: center" border="1px">
        <thead>
            <tr>
           
            <th  width=310px>CURSO/CAPACIDADES</th>
            <th  width=30px>N1</th>
            <th width=30px>N2</th>
            <th width=30px>N3</th>
            <th width=30px>PC</th></tr>
        </thead>
    </table>
    <table style="width:100%" style="text-align: center" border="1px">
       
        @foreach($cursos as $cur)
        <tr  ><td colspan="5"><b>{{$cur->curso}}</b>  </td> 
         </tr>
         @php  $PF=0 @endphp
         
         @foreach($notitas as $not)
        @if(($cur->idcurso) == ($not->idcurso))
         <tr>
           
           <td width=310px>{{$not->capacidad}}</td>
           <td border="1px" width=30px>{{$not->nota1}}</td>
           <td border="1px" width=30px>{{$not->nota2}}</td>
           <td border="1px" width=30px>{{$not->nota3}}</td>
           <td border="1px" width=30px><b> {{$not->promedio}} </b></td>
           @php  $PF=$PF+($not->promedio)/3 @endphp
           
           </tr>  
        @endif
        @endforeach
           <tr><td colspan="4" style="text-align: right"> <b>Promedio Final :</b></td> <td width=30px><b> {{round($PF)}}</b></td></tr>
        @endforeach       
    </table>
    </div>
</body>
</html>