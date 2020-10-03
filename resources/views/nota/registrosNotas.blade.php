@extends('layouts.plantilla')
@section('contenido')


<!--  para la tabla donde se va mostrar los alumnos y las notas -->
<div class="row">
    <div class="col-12">
      <h3 class="text-center">REGISTROS DE NOTAS</h3>
      <div class="col-12" style="text-align: left"> 
         <button class=" btn btn-success"  type="menu"><a class="text-white" href="../nota" ><i class="fas fa-arrow-left"> </i>  Regresar</a> </button></div>
        
      <form class="form-inline my-2 my-lg-0 float-right col-5">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por grado" aria-label="Search" value="{{$buscarpor}}">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="table-responsive " style="border-radius: 12px;" >
        <table class="table  table-bordred" name="tabla1" id="tabla1"  >
          <thead class="thead-dark text-center"  >
         
            <th scope="col">ID_PROFESOR</th>
             <th scope="col">PROFESOR</th>
             <th scope="col">ID_CURSO</th>
             <th scope="col">CURSO</th>
             <th scope="col">NIVEL</th>
             <th scope="col">GRADO</th>
             
            <th scope="col">LIBRETA</th>
          </thead>
          <tbody> 
            @foreach($notas as $itemnota)  
            <tr>
              
              <td>{{$itemnota->idprofesor}}</td>
              <td>{{$itemnota->profesor}}</td>
              <td>{{$itemnota->idcurso}}</td>
              <td>{{$itemnota->curso}}</td>
              <td>{{$itemnota->nivel}}</td>
              <td>{{$itemnota->grado}}</td>
              <td>
              
                <a class="btn btn-warning btn-md" href="{{route('nota.registroNotas',$itemnota->idcurso)}}" ><i class="fas fa-graduation-cap"></i>Ver Registros</a></td>
                 
            </tr>
            @endforeach 
         </tbody> 
       </table>
      </div>
      
    </div>
  </div>
  <div class="row">
    
  </div>
  </div>

@stop