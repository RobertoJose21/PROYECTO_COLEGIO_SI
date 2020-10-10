<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!--   -->  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Registros de Notas</title>
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
       <div class="row">
           <div class="col-12" style="text-align:center"> <h1 >REGISTROS  DE NOTAS</h1></div>
    </div>
     <br><br>
        <div class="row" >
            
           
            <table class="table" width="100%" style="margin-left: 30px;">
                <tbody>
                     
                    <tr>
                        <td style=" border: inset 0pt"><b>ID CURSO: &nbsp;&nbsp;</b>{{$curso->idcurso}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>CURSO: &nbsp;&nbsp;</b>{{$curso->curso}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>NIVEL EDUCATIVO: &nbsp;&nbsp;</b>{{$curso->grado->nivel->nivel}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>GRADO:&nbsp;&nbsp; </b>{{$curso->grado->grado}}</td>
                    </tr>
                    <tr>
                        <td style=" border: inset 0pt"><b>PROFESOR:&nbsp;&nbsp; </b>{{ $profesor->profesor }} </td>
                    </tr>
                    <tr> <td><b> CAPACIDADES:</b></td></tr>
                    @if($capacidades ->count()==1)  
                      <tr> <td> <b>C1 :</b> {{$capacidades[0]->capacidad}}</td> </tr>
                    @elseif($capacidades->count()==2)  
                      <tr> <td> <b>C1 :</b> {{$capacidades[0]->capacidad}}</td> </tr>
                      <tr><td> <b>{{' '}}C2 : &nbsp;&nbsp;</b> {{$capacidades[1]->capacidad}}</td> </tr>
                    @elseif($capacidades->count()>=3)  
                      <tr> <td> <b>{{' '}}C1 :&nbsp;&nbsp;</b> {{$capacidades[0]->capacidad}}</td> </tr>
                      <tr><td> <b>{{' '}}C2 : &nbsp;&nbsp;</b> {{$capacidades[1]->capacidad}}</td> </tr>
                      <tr><td> <b>{{' '}}C3 :&nbsp;&nbsp;</b> {{$capacidades[2]->capacidad}}</td></tr>
                    @endif        
                    <tr>
                        <td style=" border: inset 0pt"><b>PC :&nbsp;&nbsp;</b> PROMEDIO DEL CURSO  </td>
                    </tr>  
                    <tr>
                        <td style=" border: inset 0pt"><b>T1 , T2 , T3:&nbsp;&nbsp;</b>TRIMESTRES 1,2 y 3  </td>
                    </tr>  
                     
                </tbody>  
            </table>
        </div>
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
    
    <div style="page-break-after:always;"></div>
    <br>
    <h1 style="text-align: center">REGISTROS  DE NOTAS</h1>
    
  <br>  <br>
  
    <table style="align-content: center" border="0.1px" style="border-color: black">
        <thead style="text-align: center;"   >
            <tr style="background-color: cornflowerblue">
                <td style="text-align: center"><b>LISTA DE ALUMNOS: </b></td>
                <td colspan="4" style="text-align: center"><b>C1</b> </td>
                <td colspan="4" style="text-align: center"><b>C2</b></td>  
                <td colspan="4" style="text-align: center"><b>C3</b></td>
                <td ><b>PC</b></td>
            </tr>
        <tr style="background-color: deepskyblue">
            <td style="text-align: center"><b>APELLIDOS Y NOMBRES:</b></td>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P1</b> </td>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P2</b></td>
            <td>T1</td>
            <td>T2</td>
            <td>T3</td>
            <td><b>P3</b></td>
            <td><b>PF</b></td>

        </tr>
    </thead>
    <tbody  style="text-align: center">
        @if($alumno ->count())  
         @foreach($alumno as $itemalumno)
        @php
            $prom=0;
        @endphp
        <tr> 
        <td style="text-align: left"> {{$itemalumno->apellidos}},{{$itemalumno->nombres}} </td>
        @if($notas ->count())     
        @foreach($notas as $itemnota)
            @if($itemalumno->idmatricula==$itemnota->idmatricula)
           @if($itemnota->nota1>=11) <td class="azul" style="border-color: black">{{$itemnota->nota1}} </td> @else  <td class="rojo" style="border-color: black"> {{$itemnota->nota1}} </td>     @endif
           @if($itemnota->nota2>=11) <td class="azul" style="border-color: black">{{$itemnota->nota2}} </td> @else  <td class="rojo" style="border-color: black"> {{$itemnota->nota2}} </td>     @endif
           @if($itemnota->nota3>=11) <td class="azul" style="border-color: black">{{$itemnota->nota3}} </td> @else  <td class="rojo" style="border-color: black"> {{$itemnota->nota3}} </td>     @endif
           @if($itemnota->promedio>=11) <td class="azul" style="border-color: black"><b> {{$itemnota->promedio}}</b> </td> @else  <td class="rojo" style="border-color: black"><b> {{$itemnota->promedio}} </b></td>     @endif

           
            @php
                $prom=$prom+ $itemnota->promedio ;
            @endphp
            @endif
            
            @endforeach
            @endif
            @if($prom>=11) <td class="azul" style="border-color: black"> <b> {{round($prom/3) }} </b> </td>
            @else  <td class="rojo" style="border-color: black"> <b> {{round($prom/3) }} </b> </td>
            @endif
           
          
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="14">No hay registros !!</td>
        </tr>
      @endif
    </tbody>
    </table>
       
 
</div>
   



</body>
</html>