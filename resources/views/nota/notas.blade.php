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
                        <td colspan="1" style=" border: inset 0pt"><h3 class="text-center"> <b>FICHA DE MATRICULA  </b>  </h3></td>
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
     
    </table>
    <div style="page-break-after:always;"></div>

    <table style="width:100%" style="text-align: center" border="0.1px">
        <thead>
            <tr>
            <th width=210px>CURSOS</th>
            <th  width=230px>CAPACIDADES</th>
            <th  width=55px>NOTA1</th>
            <th width=55px>NOTA2</th>
            <th width=55px>NOTA3</th>
            <th width=87px>PROMEDIO</th></tr>
        </thead>
    </table>
    <table style="width:100%" style="text-align: right" border="0.1px" >
       
        <tbody>
            @php
                 $cont=0;
            @endphp
            @foreach($notitas as $nota)
            @php
             $cont=$cont+1;   
            @endphp
            
            <tr>
                
            @if($cont==1)
                <td width=210px style="border-top: 0px;" ><b>{{$nota->curso}}</b></td>   
            @elseif($cont==2||$cont==3) 
            <td width=210px style="border-top: 0px;"><b> </b></td>   
            @endif

            <td width=230px>{{$nota->capacidad}}</td>
            <td width=55px>{{$nota->nota1}}</td>
            <td width=55px>{{$nota->nota2}}</td>
            <td width=55px>{{$nota->nota3}}</td>
            <td width=87px><b> {{$nota->promedio}}</b></td>
            </tr>
             
            @php if($cont==3)
             $cont=0;
            @endphp
         @endforeach
        </tbody>
        </table>

    </div>
</body>
</html>