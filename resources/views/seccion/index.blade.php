@extends('plantillamenu')
@section('contenido')
<div class="container-fluid ">
  <div class="form-group">
    <h1>LISTADO DE SECCIONES</h1>
    
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
            <th scope="col">ID SECCION</th>
            <th scope="col">NOMBRE</th>
          </tr>
        </thead>
        <tbody>
            @foreach($seccion as $k)
                <tr>
                    <td>{{$k->seccion_id}}</td>
                    <td>{{$k->nameseccion}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>  
      {{$seccion->links()}}    
</div>

@endsection