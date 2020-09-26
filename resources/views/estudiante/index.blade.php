@extends('plantillamenu')
@section('contenido'))
<div class="container-fluid ">
  <div class="form-group">
    <h1>LISTADO DE ESTUDIANTES</h1>
    
    <form class="form-inline my-2 my-lg-0 float-right">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarpor}}">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
    @if(session('datos'))
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif


    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID_ESTUDIANTE</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">DNI</th>
            <th scope="col">GRADO</th>
          </tr>
        </thead>
        <tbody>
            @foreach($estudiante as $itemestudiante)
                <tr>
                    <td>{{$itemestudiante->estudiante_id}}</td>
                    <td>{{$itemestudiante->nameestudiante}}</td>
                    <td>{{$itemestudiante->dni}}</td>
                    <td>{{$itemestudiante->grado->namegrado}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>  
      {{$estudiante->links()}}    
</div>

@endsection