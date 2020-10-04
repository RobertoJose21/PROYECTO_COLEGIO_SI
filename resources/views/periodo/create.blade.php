@extends('layouts.plantilla')
@section('contenido')

<div class="container-fluid">

    @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      {{ session('datos') }}
        <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
 @endif
    <div class="row"><div class="col-12" style="text-align: center">
       <h3>CREAR UN NUEVO PERIODO</h3>
      </div></div>
     
        <form method="POST"  action="{{route('periodo.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
    <div class="form-group"> 
        <br>
    <div class="row">
        <div class="col"></div>
        <div class="  col-3 text-center">
            <label for="">PERIODO</label>
            <br><br>
            <input type="number" min="2000" max="2050" step="1" style="border-radius: 40px;" class="form-control   "  placeholder="Ingrese Un Perido" id="periodo" name="periodo" value="" required>
               
          </div>
        <div class="col"></div>
    </div>
    <br> 
        
    
    
    </div>
    <br> 
  
    </div>
    <br>
    <div class="row" style="text-align: center"><div class="col-12">
      <button  type="submit" value="Grabar" id="Grabar" class="btn btn-success " onclick="return confirm('Grabar ?')"style="border-radius: 40px;"><i class="fas fa-save"> </i>&nbsp;Grabar</button>
         &nbsp<a href="{{route('periodo.index')}}" class="btn btn-primary"style="border-radius: 40px;"> <i class="fas fa-window-close"> </i>&nbsp;Volver</a>
        <br> 
        </div> </div>
        
    </div>

    @endsection