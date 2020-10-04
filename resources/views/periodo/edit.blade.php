@extends('layouts.plantilla')

@section('contenido')
<style>
#outer {
    width: 100%;
    text-align: center;
    }
  
    #inner {
    display: inline-block;
    width: 50%
    }
</style>

    <div class="container-fluid" >
        <h1 style="text-align: center">Editar Periodo</h1>
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>


    @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      {{ session('datos')   }}
        <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
  @endif
        <form method="POST"  action="{{route('periodo.update',$periodo->idperiodo)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div id="outer" class="form-row">
             
            <div id="outer" class="form-group">
            <label for="periodo" id="inner">Periodo</label>
            <input type="number"  id="inner" class="form-control @error('periodo') is-invalid @enderror" id="periodo" name="periodo" min="0" value="{{$periodo->periodo}}" style="border-radius: 40px; width: 50%">
               @error('periodo')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>                  
               @enderror
           </div>
           
        </div>
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" style="border-radius: 40px;" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarPeriodo')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  
  </script>
