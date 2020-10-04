@extends('layouts.plantilla')
@section('contenido')
<style>
  :root {
    --body-bg-color: #1a1c1d;
    --hr-color: #26292a;
    --red: #e74c3c;
  }
  
  a {
    color: inherit;
    text-decoration: none;
  }
  
  .menu {
    display: flex;
    justify-content: center;
  }
  .alinealo{
    justify-content: center;
  }
  .menu a {
    position: relative;
    display: block;
    overflow: hidden;
  }
  
  .menu a span {
    transition: transform 0.2s ease-out;
  }
  
  .menu a span:first-child {
    display: inline-block;
    padding: 10px;
  }
  
  .menu a span:last-child {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-100%);
  }
  
  .menu a:hover span:first-child {
    transform: translateY(100%);
  }
  
  .menu a:hover span:last-child,
  .menu[data-animation] a:hover span:last-child {
    transform: none;
  }
  .menu[data-animation="to-top"] a span:last-child {
    transform: translateY(100%);
  }
  
  .menu[data-animation="to-top"] a:hover span:first-child {
    transform: translateY(-100%);
  }
  
  .menu[data-animation="to-right"] a span:last-child {
    transform: translateX(-100%);
  }
  
  .menu[data-animation="to-right"] a:hover span:first-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a span:last-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a:hover span:first-child {
    transform: translateX(-100%);
  }
  table tbody {
    background-color: #8ce1fd;
  }
  table tr:hover {
    background-color: #E3E4E5;}

</style>

<div class="container-fluid ">
  @if(session('datos'))
  <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{session('datos')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


<div class="row">
  <div class="col-12" style="text-align: center">
  <h1>LISTADO DE PERIODOS </h1> </div></div>
  <div class="row">
    <div class="col-2">
      <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../inicio" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
    </div> </div>
  <div class="form-group">
  
    
<nav class="navbar navbar-light ">
  <a href="{{route('periodo.create')}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-plus" ></i>&nbsp;Registrar Periodo</a><br>
  <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar Periodo" aria-label="Buscar" value="{{ $buscarpor }}"style="border-radius: 40px;">
       <button class="btn btn-success my-2 my-sm-0" type="submit" style="border-radius: 20px;"><i class="fas fa-search"> </i>&nbsp;Buscar</button>
  </form>  <!--buscador por -->

</nav> 

    
  </div>  <br>
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive " style="border-radius: 12px;" >
    <table class="table  table-bordred" style="border-radius: 12px;">
        <thead class="thead-dark text-center">
          <tr>
            <th scope="col">Id Periodo</th>
            <th scope="col">Periodo</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
            <th scope="col">Cambiar Estado</th>
          </tr>
        </thead>
        <tbody>
            @foreach($periodo as $k)
                <tr>
                    <td>{{$k->idperiodo}}</td>
                    <td>{{$k->periodo}}</td>
                    @if($k->estado==1)  <td>HABILITADO</td> 
                    @else <td>DESHABILITADO</td>  @endif
                    
                    <td class="menu" data-animation="to-left">  
                      <a href="{{route('periodo.edit',$k->idperiodo)}}" style="border-radius: 40px;"> 
                        <span><b>EDITAR</b></span>
                        <span>
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </span>
                      </a> 
                    </td>
                    <td>
                      <div class="form-group">
                        <form class="submit-eliminar " action="{{action('PeriodoController@destroy', $k->idperiodo)}}" method="post">
                           @csrf
                           <input name="_method" type="hidden" value="DELETE">
                           <button onclick="return confirm('Desea Cambiar el Estado?')" type="submit" class="btn btn-warning btn-sm" style="border-radius: 40px;">
                            <i class="fas fa-trash" ></i>
                            Cambiar
                        </button>
                         </form>
                        </div>
                    </td>

                </tr>   
            @endforeach
        </tbody>
    </table>  
          </div>
  </div></div></div>
  <div class="row"><div class="col">
      {{$periodo->links()}}    </div></div>
</div>

@endsection