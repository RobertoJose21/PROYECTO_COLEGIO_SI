@extends('layouts.plantilla')
@section('contenido')


<!--  para la tabla donde se va mostrar los alumnos y las notas -->
<div class="row">
    <div class="col-12">
      <h3 class="text-center">LISTADO DE NOTAS</h3>
      <div class="col-12"> &nbsp;</div>
      <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary">
          <input type="checkbox"> Text
        </label>
      </div><form class="form-inline my-2 my-lg-0 float-right col-5">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por Apellidos" aria-label="Search" value="{{$buscarpor}}">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="table-responsive " style="border-radius: 12px;" >
        <table class="table  table-bordred" name="tabla1" id="tabla1"  >
          <thead class="thead-dark text-center"  >
            <th scope="col">ID_ESTUDIANTE</th>
             <th scope="col">NOMBRES DE ESTUDIANTE</th>
            <th scope="col">MATRICULA</th>
            <th scope="col">FECHA MATRICULA</th>
            <th scope="col">PERIODO</th>
             
            <th scope="col">LIBRETA</th>
          </thead>
          <tbody> 
            @foreach($nota as $itemnota)  
            <tr>
              <td>{{$itemnota->idalumno}}</td>
              <td>{{$itemnota->nombres}},{{$itemnota->apellidos}}</td>
              <td>{{$itemnota->idmatricula}}</td>
              <td>{{$itemnota->fecha}}</td>
              <td>{{$itemnota->periodo}}</td>
              <td>
              
                <a class="btn btn-warning btn-md" href="{{route('nota.libretaNotas',$itemnota->idmatricula)}}" ><i class="fas fa-graduation-cap"></i>Ver Libreta  </a></td>
                 
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