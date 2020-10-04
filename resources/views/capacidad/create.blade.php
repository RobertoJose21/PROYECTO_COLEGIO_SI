@extends('layouts.plantilla')

@section('contenido')

    <div class="container-fluid" >
        <h1 style="text-align: center">Nueva Capacidad</h1>
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
  
        <form method="POST"  action="{{route('capacidad.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
          @csrf   
          
          <div class="form-row">
            <div class="from-group col-md-6">
                <label for="">Niveles</label>
                <select class="form-control" name="idnivel" id="idnivel" style="border-radius: 40px;">
                    @foreach($nivel as $k)
                <option value="{{$k['idnivel']}}" >{{$k->nivel}} </option>
                    @endforeach
                </select>
  
            </div>
            
            <div class="form-group col-md-6">
                  
                   <label for="">Grados</label>
                       <select class="form-control" name="idgrado" id="idgrado" disabled required style="border-radius: 40px;">
                         <option value="" selected>Seleccione un Grado</option>
                       </select>
            </div>
  
            <div class="from-group col-md-6">
                <label for="idcurso">Cursos</label>
                <select class="form-control" name="idcurso" id="idcurso"  required style="border-radius: 40px;">
                  <option value="" selected>Seleccione un Curso</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="capacidad">Capacidad</label>
                <input type="text" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad"  style="border-radius: 40px;">
                @error('capacidad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror              
           </div>

          
        </div>
        </div>      
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" id="grabar" class="btn btn-primary" style="border-radius: 40px;" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarCapacidad')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
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
