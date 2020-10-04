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

<div class="container-fluid">
  <div class="row">
    <div class="col-2">
      <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../inicio" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
    </div>
    
    <div class="col-7" >
  <h3>LISTA DE CATEDRAS - REGISTRADAS</h3></div>
 <!-- para seleccionar por periodos aun falta -->
  <!--<div class="  col-3 text-center"> 
    <label for=""  >PERIODO</label>
        <select class="form-control text-black" name="idperiodo" id="idperiodo" style="border-radius: 40px;">
            @foreach($periodo as $itemperiodo)
            <option value="{{$itemperiodo->idperiodo}}">{{$itemperiodo->periodo}}</option>
            @endforeach
        </select>
  </div> -->
</div>
   
  @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
          <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos') }}
              <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
  @endif
 
<nav class="navbar navbar-light ">
  
    <a href="{{route('catedra.create')}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-plus"></i>&nbsp;Registrar Catedras</a><br>
    <form class="form-inline my-2 my-lg-0 float-right" method="GET">  <!--Para que se vaya a la derecha de la pagina float-->
        <input name="buscarpor" class="form-control mr-sm-2" type="search" style="border-radius: 40px;" placeholder="Buscar por Profesores" aria-label="Search" value="{{ $buscarpor }}">
         <button class="btn btn-success my-2 my-sm-0" type="submit" style="border-radius: 40px;"> <i class="fas fa-search"> </i>&nbsp;Buscar</button>
    </form>  <!--buscador por -->

</nav> 
 <!--   esta es la vistasa de la catedra xd-->
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-12">

      
  <div class="table-responsive " style="border-radius: 12px;" >
    <table class="table" style="border-radius: 12px;" >
        <thead class="thead-dark">
          <tr>
             
            
            <th scope="col">CURSO</th>
            <th scope="col">GRADO</th>
            <th scope="col">NIVEL</th>
            <th scope="col">PERIODO</th>
            <th scope="col">PROFESOR</th>
            <th scope="col" style="text-align: center"  >EDITAR</th>
            <th scope="col" style="text-align: center"   > ELIMINAR</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($catedras as $itemcat)
           
        
        
            
         
            <tr>
                   <td>{{$itemcat->curso}}</td>
                    <td>{{$itemcat->grado}}</td>
                    <td>{{$itemcat->nivel}}</td>
                    <td>{{$itemcat->periodo}}</td>
                    <td>{{$itemcat->profesor}}</td>
                    <td class="menu" data-animation="to-left">  
                      <a href="{{route('catedra.edit',$itemcat->id)}}" style="border-radius: 40px;"> 
                        <span><b>EDITAR</b></span>
                        <span>
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </span>
                      </a> 
                    </td>
                    <td>
                      <div class="form-group">
                        <form class="submit-eliminar " action="{{action('Detalle_CatedraController@destroy', $itemcat->id)}}" method="post">
                           @csrf
                           <input name="_method" type="hidden" value="DELETE" >
                           <button onclick="return confirm('Desea eliminar esta Catedra?')" type="submit" class="btn btn-danger btn-sm" style="border-radius: 40px;">
                            <i class="fas fa-trash"></i>
                            Eliminar
                        </button>
                         </form>
                        </div>
                    </td>
                    
                </tr>  
                     
                
            @endforeach
          
        </tbody>
    </table>  
  </div>
</div>
  </div>
</div>
  <div class="row" style="text-align: center">
    <div class="col"></div>
    <div class="col" style="text-align: center">
    <h5>{{$catedras->links()}}</h5></div>
    <div class="col"></div>
  </div>
</div>
@endsection