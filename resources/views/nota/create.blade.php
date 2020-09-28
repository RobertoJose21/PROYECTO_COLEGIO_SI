@extends('layouts.plantilla')

@section('contenido')

<div class="container">
    <h2> AGREGAR UNA NOTA A UN ALUMNO -  </h2>
<form method="POST"  action="{{route('nota.store')}}">
     
        @csrf
        <div class="form-row">
            
        <div class="col-4 text-center">
            <label for="">ALUMNO</label>
                <select class="form-control  text-success" name="idalumno" id="idalumno" style="border-radius: 40px;">
                    <option value="" disabled selected>Seleccione un Alumno</option> 
                    @foreach($alumno as $itemalumno)
                    <option value="{{$itemalumno['idalumno']}}">{{$itemalumno['nombres']}}, {{$itemalumno['apellidos']}}</option>
                    @endforeach
                </select>
          </div>
          <div class="col-4 text-center">
            <label for="">Matricula</label>
            <select class="form-control  text-success" name="idmatricula" id="idmatricula" style="border-radius: 40px;" disabled required>
                <option value="" selected>Seleccione una Matricula</option>    
            </select>   
        </div>
        <div class="col-4 text-center">
            <label for="">Curso</label>
            <select class="form-control  text-success" name="idcurso" id="idcurso" style="border-radius: 40px;" disabled required>
                <option value="" selected>Seleccione un Curso</option>    
            </select>   
        </div>
          <div class="col-4 text-center"  >
            <label for="">CAPACIDADES</label>
                <select class="form-control  text-success" name="idcapacidad" id="idcapacidad" style="border-radius: 40px;" disabled required>
                    <option value="" selected>Seleccione una Capacidad</option>       
                </select>
          </div>
          <div class="  col-4 text-center">
            <label for="">DOCENTE</label>
                <select class="form-control text-success " name="idprofesor" id="idprofesor" style="border-radius: 40px;" disabled required>
                <option value="" selected>Docente</option>     
                </select>
          </div>
        </div> 
          <div class="row">
            <div class="form-group col-md-3 text-center ">
                <label for="id">NOTA - 1</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success  @error('nota1') is-invalid @enderror"  placeholder="0" id="nota1" name="nota1" value="">
                @error('nota1')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id">NOTA - 2</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success  @error('nota2') is-invalid @enderror"  placeholder="0" id="nota2" name="nota2" value="">
                @error('nota2')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id" >NOTA - 3</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success  @error('nota3') is-invalid @enderror"  placeholder="0" id="nota3" name="nota3" value="">
                @error('nota3')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="row"> 
            <div class="col" style="text-align: right"> <button type="submit" class="btn btn-primary" id="botonguardar" disabled><i class="fas fa-save"></i> GRABAR</button></div>
            <div class="col" style="text-align: left"> <a href="{{route('cancelarnota')}}" class="btn btn-danger"><i class="fas fa-ban"></i>CANCELAR</a></div>
        </div>
        </div>
    
       
       
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script >
     //para el combobox matricula
     $(document).ready(function(){
      $("#idalumno").change(function(){
            var nivel = $(this).val();
                $('#idmatricula').removeAttr('disabled');
            $.get('../../matriculabyalumno/'+nivel, function(data){
              console.log(data);
                var producto_select = '<option value="" disabled selected>Seleccione una matricula</option>'
                  for (var i=0; i<data.length;i++)
                    producto_select+='<option value="'+data[i].idmatricula+'">'+data[i].fecha+'</option>';
                  $("#idmatricula").html(producto_select);
    
            });
          });
          $("#idmatricula").change(function(){
            var matricula = $(this).val();
                $('#idcurso').removeAttr('disabled');
            $.get('../../cursobymatricula/'+matricula, function(data){
              console.log(data);
                var producto_select = '<option value="" disabled selected>Seleccione un curso</option>'
                  for (var i=0; i<data.length;i++)
                    producto_select+='<option value="'+data[i].idcurso+'">'+data[i].curso+'</option>';
                  $("#idcurso").html(producto_select);
    
            });
          });

          $("#idcurso").change(function(){
        var curso = $(this).val();
        $("#idcapacidad").removeAttr('disabled');
       // $("#idprofesor").removeAttr('disabled');
        $.get('../capacidadbycursos/'+curso, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione una Capacidad</option>';
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idcapacidad+'">'+data[i].capacidad+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ninguna Capacidad Encontrada</option>';

            $("#idcapacidad").html(producto_select);

        });

            $.get('../profesorbycurso/'+curso, function(data){
          console.log(data);
            var producto_select ;
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idprofesor+'">'+data[i].profesor+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ningun Docente Encontrado</option>';

            $("#idprofesor").html(producto_select);

        });
    });
    
    
     $("#idcapacidad").change(function(){
        var capacidad = $(this).val();
        $("#botonguardar").removeAttr('disabled');
        //$("#idprofesor").removeAttr('disabled');

        });
     });
          </script>