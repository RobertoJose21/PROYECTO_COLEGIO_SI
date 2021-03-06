@extends('layouts.plantilla')
@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col-12"> <h1 style="text-align: center">Nuevo Profesor</h1></div></div>
               
                <div class="row">
                    <div class="col-12">&nbsp;</div>
            </div>
                <form method="POST"  action="{{route('profesor.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
                    @csrf   
                   
                 <div class="form-row">
                     <div class="col"></div>
                        <div class="from-group col-md-5">
                            <h5  style="text-align: center"  style="border-radius: 40px;">Profesor</h5>
                            <input type="text" class="form-control" name="profesor" id="profesor" required  style="border-radius: 40px;"> 
                        </div>
                        <div class="from-group col-md-3">
                            <h5 style="text-align: center"  style="border-radius: 40px;">Código del Profesor</h5>
                                <input type="number" class="form-control" name="codigoprofesor" id="codigoprofesor" required  style="border-radius: 40px;"> 
                        </div>
                        <div class="col"></div>
                </div>
                <div class="row">
                        <div class="col-12">&nbsp;</div>
                </div>
                <div class="row"><div class="col-12">&nbsp;</div></div>   
                  <div class="row"><div class="col-12">&nbsp;</div></div>
                  <div class="row">
                        <div class="col">&nbsp;</div> 
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="border-radius: 40px;" ><i class="fas fa-save"></i>&nbsp;Guardar</button>
                            <a href="{{route('cancelarProfesor')}}" class="btn btn-danger" style="border-radius: 40px;"> <i class="fas fa-ban"></i> &nbsp;Cancelar</a>
                        </div>
                        <div class="col">&nbsp;</div> 
                  </div>
                  <div class="row"><div class="col-12">&nbsp;</div></div>   
                  <div class="row"><div class="col-12">&nbsp;</div></div>
                  <div class="row"><div class="col-12">&nbsp;</div></div>   
                  <div class="row"><div class="col-12">&nbsp;</div></div>   
                </form>
    </div>
@endsection
