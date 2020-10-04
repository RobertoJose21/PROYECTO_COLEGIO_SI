@extends('layouts.plantilla')

@section('contenido')

    <div class="container-fluid" >
        <h1 style="text-align: center">Nueva Seccion</h1>
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
  
        <form method="POST"  action="{{route('seccion.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
         <div class="form-row">
             
            <div class="form-group col-md-6">
                <label for="seccion">Seccion</label>
                <select class="form-control custom-select" name="seccion" id="seccion"   style="border-radius: 40px;">
                  <option value="" selected>Seleccione una Seccion</option>
                  <option value="A" >A</option>
                  <option value="B" >B</option>
                  <option value="C" >C</option>
                  <option value="D" >D</option>
                  <option value="E" >E</option>
                  <option value="F" >F</option>
                  <option value="G" >G</option>
                  <option value="H" >H</option>
                  <option value="I" >I</option>
                  <option value="J" >J</option>
                </select>
           </div>
           <div class="from-group col-md-6">
            <label for="idgrado">Grados</label>
                  <select class="form-control" name="idgrado" id="idgrado"  style="border-radius: 40px;">
                        @foreach($grado as $k)
                          <option value="{{$k['idgrado']}}">{{$k['grado']}}</option>
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
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $("#seccion").change(function(){
              var curso = $(this).val();
              $("#idgrado").removeAttr('disabled');
       // $("#idprofesor").removeAttr('disabled');

             $.get('../capacidadbycursos3/'+curso, function(data3){
              console.log(data3);

                    $.get('../capacidadbycursos2/'+curso, function(data1){
                      console.log(data1);
                    var producto_select = '<option value="" disabled selected>Seleccione una Capacidad</option>';
                    //matricula=document.getElementById('idmatricula').value;
                    if(data3.length>=1){
                      for (var i=0; i<data3.length;i++){
                        var cont=0;
                          for(var x=0;x<data1.length;x++){
                            if(data3[i].idcapacidad==data1[x].idcapacidad){cont=cont+1;}
                          }
                        if(cont==0){
                        producto_select+='<option value="'+data3[i].idcapacidad+'">'+data3[i].capacidad+'</option>';
                      
                        }
                    //  c=0;  }
                          }
                    }else
                        producto_select+='<option value="" disabled selected>Ninguna Capacidad Encontrada</option>';
                    $("#idcapacidad").html(producto_select);

        });

      });
  </script>
