

           <h1 style="text-align: center">Ficha de Matricula</h1>
           <table style="width:100%">
               <tr><td><b>Numero de Matricula: </b>{{$matricula->idmatricula}}</td></tr>
               <tr><td style="text-align: right"><b>Fecha: </b>{{$matricula->fecha}} <br></td>  </tr>
               <tr><td><b>Nivel Educativo: </b>{{$matricula->seccion->grado->nivel->nivel}}</td></tr>
               <tr><td><b>Grado: </b>{{$matricula->seccion->grado->grado}}</td></tr>
               <tr><td><b>Seccion: </b>{{$matricula->seccion->seccion}}</td></tr>
               <tr><td ><b>Periodo: </b>{{$matricula->periodo->periodo}}</td></tr>

               <tr><td style="text-align: right"><b>Alumno: </b>{{$matricula->alumno->apellidos}} <br>
                {{$matricula->alumno->nombres}}    
            </td> <br></tr>
            
               <tr><td style="text-align: center"><b> Firma Director: </b> <img src="img/firma.png" width="20%" alt=""></td></tr>
           </table>
