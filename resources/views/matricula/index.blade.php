@extends('layouts.plantilla')

@section('contenido')
<style>
  table tbody {
  background-color: #8ce1fd; 
}
table tr:hover {
  background-color: #E3E4E5;
}
</style>


<div class="container">
  <h1>Listado de Matriculas</h1>

  @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
          <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos')   }}
              <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
      @endif

    <a href="{{route('matricula.create')}}" class="btn btn-primary form-inline my-2 my-lg-0 float-left" ><i class="fas fa-plus"></i>Nuevo Registro </a>

<nav class="navbar navbar-light float-right">
    <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por Fecha" aria-label="Search" value="{{ $buscarpor }}">
         <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>  <!--buscador por -->

</nav> 

        
    <table class="table">
        <thead class="thead-dark">
          <tr>
        
            <th scope="col">Nro Matricula</th>
            <th scope="col">fecha</th>
            <th scope="col">Codigo Educando</th>            
            <th scope="col">Nivel</th>
            <th scope="col">Id Grado</th>
            <th scope="col">Seccion</th>
            <th scope="col">Escala</th>
            <th scope="col">Año Escolar</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>

           @foreach($matricula as  $k)  <!--nombre de la categoria q pusimos anteriormente-->
            
          <tr>
        
            <td>{{$k->numeromatricula}}</td>
            <td>{{$k->fecha}}</td>
            <td>{{$k->estudiante_id}}</td>           
            <td>{{$k->nivel}}</td>
            <td>{{$k->año}}</td>
            <td>{{$k->nameseccion}}</td>
            <td>{{$k->escala}}</td>
            <td>{{$k->añoescolar}}</td>
            <td>
            <a href="{{route('matricula.edit', $k->numeromatricula)}}" class="btn btn-info btn-sm">
            
                <i class="fas fa-edit"></i>Editar
             </a>

                <a href="{{route('matricula.confirmar', $k->numeromatricula)}}" class="btn btn-danger btn-sm">
            
                     <i class="fas fa-trash"></i>Eliminar
                 </a>
             </td>
            
          </tr>
        
          @endforeach
        </tbody>
    
      </table>
      {{$matricula->links()}}   <!--creamos la paginacion y asi nos sale los datos-->
    
      </div>
  
@endsection