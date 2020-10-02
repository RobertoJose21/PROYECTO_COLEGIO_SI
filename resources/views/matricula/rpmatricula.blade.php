<!doctype html >
<html lang="es" >
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>FICHA DE MATRICULA</title>
  </head>
  <body >
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
        <div class="row" style="margin-left: 30px;margin-right: 90px">
            <table class="table table-striped table-bordered table-hover">
                <thead style="background-color:#F0812B; color: #fff;">  
                    <tr>
                        <th colspan="2" width="5" class="text-center">DETALLES DE LOS CURSOS Y PROFESORES</th>  
                    </tr>
                    <tr>
                        <th width="5" class="text-center">LISTADO DE CURSOS</th>  
                        <th width="5" class="text-center">PROFESORES</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach($cursos as $cur)
                    <tr>
                        <td style=" border: inset 0pt" class="text-center">{{$cur->curso}}</td>
                        <td style=" border: inset 0pt" class="text-center">{{$cur->profesor}}</td>
                    </tr>
                    @endforeach  
                </tbody>  
            </table>
        </div>

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
    
  </body>
</html>