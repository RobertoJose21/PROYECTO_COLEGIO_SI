<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
       <title>Libreta de Notas</title>
       <style>
        .azul{
            color:blue;
        }
        .rojo{
            color:red;
        }

       
    </style>
</head>
<body>
    
<div class="container-fluid">
    <div class="container-fluid" style="background-image: url('img/logoInnova.png); background-size: contain;background-repeat: no-repeat; opacity:0.4;background-position: 50% 15%">
        <img src="img/centrotpf.png" alt="" width="10%" alt="" style="position:absolute;margin-left: 90%;">
        <div class="row" >
            
            <table class="table"  style="margin-left: 30px;">
                <tbody>
                    <tr>
                        <td colspan="1" style=" border: inset 0pt"><h1 class="text-center"> <b>LIBRETA DE NOTAS </b>  </h1></td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b> NUMERO DE MATRICULA : </b>&nbsp;&nbsp;{{$matricula->idmatricula}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>FECHA : </b>&nbsp;&nbsp;{{$matricula->fecha}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>NIVEL EDUCATIVO  : </b>&nbsp;&nbsp;{{$matricula->seccion->grado->nivel->nivel}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>GRADO : </b>&nbsp;&nbsp;{{$matricula->seccion->grado->grado}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>SECCIÓN : </b>&nbsp;&nbsp;{{$matricula->seccion->seccion}}</td>
                    </tr>
                    <tr>  
                    <td  style=" border: inset 0pt"><b>PERIODO : </b>&nbsp;&nbsp;{{$matricula->periodo->periodo}}  </td>
                    </tr> 
                    <tr>
                        <td style=" border: inset 0pt"><b>ALUMNO : </b>&nbsp;&nbsp;<b>{{$matricula->alumno->apellidos}},{{$matricula->alumno->nombres}}</b> </td>
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
                    <tr>
                        <th width="5" class="text-center" style=" border: inset 0pt"><b>LUIS PEDRO ALAYO RODRIGUEZ   </b></th>  
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
<!--  para las libretas  de los alumnos
    </table> -->
    <div style="page-break-after:always;"></div>
    <table style="width:100%" style="text-align: center" border="1px">
        <thead style="background-color: cornflowerblue">
            <tr >
           
            <th  width=310px>CURSO/CAPACIDADES</th>
            <th  width=30px style="text-align: center">N1</th>
            <th width=30px style="text-align: center">N2</th>
            <th width=30px style="text-align: center">N3</th>
            <th width=30px style="text-align: center">PC</th></tr>
        </thead>
    </table>
    <table style="width:100%" style="text-align: center" border="1px">
       
        @foreach($cursos as $cur)
        <tr  >
            <td colspan="5"  style="background-color: rgb(193, 208, 235)"><b>{{$cur->curso}}</b>  </td> 
         </tr>
         @php  $PF=0 @endphp
         
         @foreach($notitas as $not)
        @if(($cur->idcurso) == ($not->idcurso))
         <tr>
          
           <td width=310px>{{$not->capacidad}}</td>
           @if($not->nota1>=11)   <td class="azul" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota1}}</td> 
           @else  <td class="rojo" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota1}}</td>  @endif

           @if($not->nota2>=11)   <td class="azul" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota2}}</td> 
           @else  <td class="rojo" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota2}}</td>  @endif

           @if($not->nota3>=11)   <td class="azul" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota3}}</td> 
           @else  <td class="rojo" border="1px" width=30px  style="border-color: black; text-align: center">{{$not->nota3}}</td>  @endif

           @if($not->promedio>=11)   <td class="azul" border="1px" width=30px  style="border-color: black; text-align: center"><b>{{$not->promedio}}</b> </td> 
           @else  <td class="rojo" border="1px" width=30px  style="border-color: black; text-align: center"><b> {{$not->promedio}}</b></td>  @endif
          
          
           @php  $PF=$PF+($not->promedio)/3 @endphp
           
           </tr>  
        @endif
        @endforeach
           <tr><td colspan="4" style="text-align: right"> <b>Promedio Final :</b></td> 
            @if($PF>=11)<td class="azul"width=30px style="border-color: black; text-align: center"><b> {{round($PF)}}</b></td> 
            @else <td class="rojo"width=30px style="border-color: black; text-align: center"><b> {{round($PF)}}</b></td>   @endif
        </tr>
        @endforeach       
    </table>
    </div>
</body>
</html>