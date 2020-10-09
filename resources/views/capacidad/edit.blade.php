@extends('layouts.plantilla')

@section('contenido')

<div class="container-fluid" >
  <h1 style="text-align: center">Editar Capacidad</h1>
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
  <form method="POST"  action="{{route('capacidad.update',$capacidad->idcapacidad)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
    @method('put')
    @csrf  
            
            <div class="form-row">
              
              <div class="from-group col-md-6">
               <label for="idnivel">Niveles</label>
               <select name="idnivel" id="idnivel" class="form-control"  required  style="border-radius: 40px;">
                   <option value="" disabled selected>Seleccione un Nivel (Nivel actual: {{$capacidad->curso->grado->nivel->nivel}})</option>
                   @foreach ( $nivel as $itemnivel)
               <option value="{{$itemnivel['idnivel']}}">{{$itemnivel['nivel']}}</option>
                   @endforeach
               </select>
              
              </div>
              
              <div class="form-group col-md-6">
                  
                   <label for="idgrado">Grados</label>
                       <select class="form-control" name="idgrado" id="idgrado" style="border-radius: 40px;" disabled required>
                           <option value="" selected>Seleccione un Grado (Grado actual: {{$capacidad->curso->grado->grado}})</option>
              
                       </select>
              </div>
              
              <div class="from-group col-md-6">
              <label for="">Cursos</label>
              <select class="form-control" name="idcurso" id="idcurso" disabled required style="border-radius: 40px;">
                 <option value="" selected>Escoja Curso (Curso actual: {{$capacidad->curso->curso}})</option>
              </select>
              
              </div>
              
                    <div class="form-group col-md-6">
                  <label for="capacidad">Capacidad</label>
                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad"  style="border-radius: 40px;" value="{{$capacidad->capacidad}}">
                  @error('capacidad')
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
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" style="border-radius: 40px;" class="btn btn-primary" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarCapacidad')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
      $("#idnivel").change(function(){
        var nivel = $(this).val();
            $('#idgrado').removeAttr('disabled');
        $.get('/gradobynivelesCapacidad/'+nivel, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione un Grado</option>'
              for (var i=0; i<data.length;i++){

                producto_select+='<option value="'+data[i].idgrado+'">'+data[i].grado+'</option>';
              }
              $("#idgrado").html(producto_select);

        });
      });

      $("#idgrado").change(function(){
        var grado = $(this).val();
        $("#idcurso").removeAttr('disabled');
        $.get('/cursosbygradosCapacidad/'+grado, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione un Curso</option>';
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idcurso+'">'+data[i].curso+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ninguna Curso encontrado</option>';

            $("#idcurso").html(producto_select);

        });
      });
    });

  
  </script>
