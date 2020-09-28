@extends('layouts.plantilla')

@section('contenido')

    <div class="contenido" >
                <h1>Nueva Matricula</h1>
                          <!--para lo que se toque-->
                <form method="POST"  action="{{route('matricula.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
                    @csrf   
                   
                 <div class="form-row">
                     
                     <div class="from-group col-md-6">
                         <label for="">Alumno</label>
                         <select class="form-control" name="idalumno" id="idalumno">
                             @foreach($alumno as $k)
                             <option value="{{$k['idalumno']}}">{{$k['apellidos']}}</option>
                             @endforeach
                            </select>
                            
                        </div>
                         <div class="form-group col-md-6">
                             <label for="fecha">fecha</label>
                            <input type="date"  class="form-control"   id="fecha" name="fecha" >
                                        
                         </div>
                </div>


                <div class="form-row">
                   
                    <div class="from-group col-md-6">
                        <label for="">Niveles</label>
                        <select class="form-control" name="idnivel" id="idnivel">
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
                </div>

                <div class="form-row">        
                    <div class="from-group col-md-6">
                        <label for="">Seccion</label>
                        <select class="form-control" name="idseccion" id="idseccion" disabled required>
                          <option value="" selected>Seleccione una Seccion</option>
                        </select>
                    </div>
                     
                     <div class="form-group col-md-6">
                        
                            <label for="">Periodo</label>
                                <select class="form-control" name="idperiodo" id="idperiodo" style="border-radius: 40px;">
                                    @foreach($periodo as $k)
                                        <option value="{{$k['idperiodo']}}">{{$k['periodo']}}</option>
                                    @endforeach
                                </select>
                     </div>
     
                </div>

                    
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-save"></i>Grabar</button>
                      <a href="{{route('cancelarMatricula')}}" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      $("#idnivel").change(function(){
        var nivel = $(this).val();
            $('#idgrado').removeAttr('disabled');
        $.get('/gradobyniveles/'+nivel, function(data){
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
        $("#idseccion").removeAttr('disabled');
        $.get('/seccionesbygrados/'+grado, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione una Seccion</option>';
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idseccion+'">'+data[i].seccion+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ninguna Seccion encontrada</option>';

            $("#idseccion").html(producto_select);

        });
      });
    });
  </script>
