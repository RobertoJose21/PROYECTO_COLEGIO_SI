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
<div class="container-fluid ">
  <div class="form-group">
    <h1>LISTADO DE PERIODOS </h1>
    
    <form class="form-inline my-2 my-lg-0 float-right">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarpor}}">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>  <br>
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
            <th scope="col">Id Periodo</th>
            <th scope="col">Periodo</th>
          </tr>
        </thead>
        <tbody>
            @foreach($periodo as $k)
                <tr>
                    <td>{{$k->idperiodo}}</td>
                    <td>{{$k->periodo}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>  
      {{$periodo->links()}}    
</div>

@endsection