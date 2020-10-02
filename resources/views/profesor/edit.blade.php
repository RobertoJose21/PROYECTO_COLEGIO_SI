@extends('layouts.plantilla')
@section('contenido')

    <div class="container-fluid" >
                <h1 style="text-align: center">Nuevo Profesor</h1>
                <div class="row">
                    <div class="col-12">&nbsp;</div>
            </div>
                <form method="POST"  action="{{ route('profesor.update', $profesor->idprofesor) }}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
                    @method('put')
                    @csrf  
                 <div class="form-row">
                     
                        <div class="from-group col-md-6">
                            <h5  style="text-align: center">Profesor</h5>
                        <input type="text" class="form-control" name="profesor" id="profesor" value="{{$profesor->profesor}}" required> 
                        </div>
                        <div class="from-group col-md-6">
                            <h5 style="text-align: center">Código del Profesor</h5>
                                <input type="number" class="form-control" name="codigoprofesor" id="codigoprofesor" value="{{$profesor->codigoprofesor}}" required> 
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
                            <button class="btn btn-success" data-loading text="<i class='fa a-spinner fa-spin'></i> Modificando"> 
                                <i class='fas fa-save'></i> EDITAR</button>  
                            <a href="{{route('cancelarProfesor')}}" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
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