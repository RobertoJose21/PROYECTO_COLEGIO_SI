@extends('layouts.plantilla')

@section('contenido')

    <div class="container-fluid" >
        <h1 style="text-align: center">Editar Seccion</h1>
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
        <form method="POST"  action="{{route('seccion.update',$seccion->idseccion)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
             
            <div class="form-group col-md-6">
                <label for="seccion">Seccion</label>
            <input type="text" class="form-control @error('seccion') is-invalid @enderror" id="seccion" name="seccion" value="{{$seccion->seccion}}" style="border-radius: 40px;">
               @error('seccion')
                   <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>                  
               @enderror
           </div>
           <div class="from-group col-md-6">
            <label for="">Grados</label>
                  <select class="form-control" name="idgrado" id="idgrado" style="border-radius: 40px;">
                        @foreach($grado as $k)
                          <option value="{{$k->idgrado}}"{{$k->idgrado==$seccion->idgrado ? 'selected':''}}>{{$k->grado}}</option>
                        @endforeach
                 </select>                           
            </div>
        </div>
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
        <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-5">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarSeccion')}}" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  
  </script>
