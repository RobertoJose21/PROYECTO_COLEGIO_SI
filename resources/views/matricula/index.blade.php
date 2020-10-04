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
    background-color: #E3E4E5;
  }
  
  </style>


<div class="container">
  <h3 class="text-center">LISTADO DE MATRICULAS</h3>
  <div class="col-12"> &nbsp;</div>

  @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
          <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos')   }}
              <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
  @endif
  <a href="{{route('matricula.create')}}" class="btn btn-primary"  ><i class="fas fa-plus"></i>Nuevo Registro </a>
  
  <nav class="navbar navbar-light ">
    <a href="{{route('graficoMatricula')}}" class="btn primary" ><i class="fas fa-chart-pie"></i>Estadistica</a>
          <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
              <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por Apellidos" aria-label="Search" value="{{ $buscarpor}}">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar <i class="fa fa-search"></i></button>
          </form>  <!--buscador por -->

      </nav>         
    <div class="table-responsive"  style="border-radius: 12px;">
      <table class="table" style="border-radius: 12px;">
        <thead class="thead-dark">
          <tr>
        
            <th scope="col" style="text-align: center" >nroMatricula</th>
            <th scope="col" style="text-align: center" >Alumno</th>            
            <th scope="col" style="text-align: center" >Fecha</th>
            <th scope="col" style="text-align: center" >Nivel</th>
            <th scope="col" style="text-align: center" >Grado</th>
            <th scope="col" style="text-align: center" >Seccion</th>
            <th scope="col" style="text-align: center" >Periodo</th>
            <th scope="col" style="text-align: center" >PDF</th>
            <th scope="col"  style="text-align: center">Editar</th>
            <th scope="col"  style="text-align: center">Eliminar</th>
          </tr>
        </thead>
        <tbody>

           @foreach($matricula as  $k)  <!--nombre de la categoria q pusimos anteriormente-->
            
          <tr>
        
            <td style="text-align: center">{{$k->idmatricula}}</td>
            <td style="text-align: center">{{$k->apellidos}}, {{$k->nombres}}</td>
            <td style="text-align: center">{{$k->fecha}}</td>           
            <td style="text-align: center">{{$k->nivel}}</td>
            <td style="text-align: center">{{$k->grado}}</td>
            <td style="text-align: center">{{$k->seccion}}</td>
            <td style="text-align: center">{{$k->periodo}}</td>
            
              <td>

                <a class="btn btn-success btn-xs" href="{{route('imprimeMatricula',$k->idmatricula)}}" class="btn-primary btn-sm" ><i class="far fa-file-pdf"></i>PDF</a>

              </td>
                
              <td>
                <a href="{{route('matricula.edit', $k->idmatricula)}}" class="btn btn-info btn-sm">
                 <i class="fas fa-edit"></i>Editar</a>

              </td>
             
              <td>
                <a href="{{route('matricula.confirmar', $k->idmatricula)}}" class="btn btn-danger btn-sm">
                  
                  <i class="fas fa-trash"></i>Eliminar
                </a>          
              </td>
          </tr>       
          @endforeach
        </tbody>  
      </table>
      <a href="/inicio" style="margin-left: 95%" class="btn btn-info btn-sm">
        <i class="fas fa-backward"></i> Volver</a>
      <div class="align-center" style="margin-left: 45%"><h5>{{$matricula->links()}}</h5></div>
    
      </div>
  
@endsection