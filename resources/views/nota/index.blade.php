@extends('layouts.plantilla')

@section('contenido')
<style>
:root {
  --body-bg-color: #1a1c1d;
  --hr-color: #26292a;
  --red: #e74c3c;
}

a {
  color: inherit;
  text-decoration: none;
}

.menu {
  display: flex;
  justify-content: center;
}
.alinealo{
  justify-content: center;
}
.menu a {
  position: relative;
  display: block;
  overflow: hidden;
}

.menu a span {
  transition: transform 0.2s ease-out;
}

.menu a span:first-child {
  display: inline-block;
  padding: 10px;
}

.menu a span:last-child {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translateY(-100%);
}

.menu a:hover span:first-child {
  transform: translateY(100%);
}

.menu a:hover span:last-child,
.menu[data-animation] a:hover span:last-child {
  transform: none;
}
.menu[data-animation="to-top"] a span:last-child {
  transform: translateY(100%);
}

.menu[data-animation="to-top"] a:hover span:first-child {
  transform: translateY(-100%);
}

.menu[data-animation="to-right"] a span:last-child {
  transform: translateX(-100%);
}

.menu[data-animation="to-right"] a:hover span:first-child {
  transform: translateX(100%);
}

.menu[data-animation="to-left"] a span:last-child {
  transform: translateX(100%);
}

.menu[data-animation="to-left"] a:hover span:first-child {
  transform: translateX(-100%);
}
table tbody {
  background-color: #8ce1fd;
}
table tr:hover {
  background-color: #E3E4E5;
}

</style>
<div class="container-fluid">

  
  @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
          <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos')   }}
              <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
      @endif
     

  <div class="row">

    <div class="  col-3 text-center">
      <label for="">PERIODO</label>
          <select class="form-control" name="idperiodo" id="idperiodo" style="border-radius: 40px;">
              @foreach($periodo as $itemperiodo)
              <option value="{{$itemperiodo['idperiodo']}}">{{$itemperiodo['periodo']}}</option>
              @endforeach
          </select>
    </div>

      <div class="  col-3 text-center">
        <label for="">NIVELES</label>
            <select class="form-control" name="idnivel" id="idnivel" style="border-radius: 40px;">
              <option value="" disabled selected>Seleccione un Nivel</option>
                @foreach($nivel as $itemnivel)
                <option value="{{$itemnivel['idnivel']}}">{{$itemnivel['nivel']}}</option>
                @endforeach
            </select>
      </div>
      

      <div class=" col-4 text-center">
        <label for="">GRADOS</label>
             
              <select  name="idgrado" id="idgrado"  class="form-control" style="border-radius: 40px;" disabled required>
                <option value="" selected>Seleccione un Grado</option>
            </select>
            
      </div>  
       
      <div class="   col-2 text-center">
        <label for="">SECCIONES</label>
            <select class="form-control" name="idseccion" id="idseccion" style="border-radius: 40px;" disabled required>
              <option value="" selected>Seleccione una Seccion</option> 
            </select>
      </div>
  </div><br>
<div class="row">
  
  <div class="  col-4 text-center">
    <label for="">CURSO</label>
        <select class="form-control" name="idcurso" id="idcurso" style="border-radius: 40px;" disabled required>
          <option value="" selected>Seleccione un curso</option> 
          
        </select>
  </div>
  <div class="  col-4 text-center">
    <label for="">CAPACIDAD</label>
        <select class="form-control" name="idcapacidad" id="idcapacidad" style="border-radius: 40px;" disabled required>
          <option value="" selected>Seleccione una Capacidad</option>    
        </select>
  </div>
  <div class="   col-4 text-center">
    <label for="">DOCENTE</label>
        <select class="form-control" name="idprofesor" id="idprofesor" style="border-radius: 40px;" disabled required>
        <option value="" selected>Docente</option>     
        </select>
  </div>
</div><br>
 
 
<div class="row">
  <div class="col-4">
    <a type="button" href="{{route('nota.create')}}" class="btn btn-success " style="text-align: left" ><i class="fas fa-plus"></i>_Agregar Nota</a><br>

  </div>
  <div class="col-4">
    
    <a href="{{route('nota.libretas')}}" class="btn btn-success" ><i class="fas fa-graduation-cap"></i>_Ver Libretas</a>
  </div>

  <div class="col-4">
    
    <a href="{{route('nota.registros')}}" class="btn btn-success" ><i class="fa fa-book"></i>_Ver Registros de Notas</a>
  </div>
</div>
  
 
<div class="modal fade" id="modal_editar" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
              <h3 class="modal-title text-black">Modificar Nota</h3>
          </div>
          <div class="modal-body">

            <div class="form-group">
            <form method="post" action="{{route('nota.store')}}">
     
              @csrf
              <div class="form-row">
                  
                <div class="  col col-xs-1 text-center">
                  <label for="id" class="text-black">ID</label>
              <input type="number"  class="form-control text-success"   id="idnota" name="idnota"   disabled   >
              </div>
                  
                  <div class="  col-md-3 text-center">
                      <label for="id" class="text-black">NOTA 1 :</label>
                  <input type="number" min="0" max="20" step="0.1" class="form-control text-danger"   id="editarnota1" name="nota1"   >
                  </div>
                  <div class="  col-md-3 text-center">
                      <label for="id" class="text-black">NOTA 2 :</label>
                      <input type="number" min="0" max="20" step="0.1" class="form-control text-danger"   id="editarnota2" name="nota2"  >
                  </div>
                  <div class="  col-md-3 text-center">
                      <label for="id" class="text-black">NOTA 3 :</label>
                  <input type="number" min="0" max="20" step="0.1" class="form-control text-danger"  id="editarnota3" name="nota3"  >
                  </div>
               
                
                   
                  
              </div>
              
              </div>
          
             
              <button type="submit" class="btn btn-primary"    ><i class="fas fa-save"></i> GRABAR</button><!--no hace nada-->
              <button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
          </form>
          </div>
          </div>
          <div class="modal-footer">
           
          </div>
      </div>

  </div>
</div>

 
<!--  para la tabla donde se va mostrar los alumnos y las notas -->
<div class="row">
  <div class="col-12">
    <h3 class="text-center">LISTADO DE NOTAS</h3>
    <div class="col-12"> &nbsp;</div>
    <!--<div class="btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-primary">
        <input type="checkbox"> Text
      </label>
    </div><form class="form-inline my-2 my-lg-0 float-right col-4">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarpor}}">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <div class="table-responsive " style="border-radius: 12px;" >
      <table class="table  table-bordred" name="tabla1" id="tabla1"  >
        <thead class="thead-dark text-center"  >
          <th scope="col">ID_NOTA</th>

          <th scope="col">NOMBRES DE ESTUDIANTE</th>
          <th scope="col">NOTA 1</th>
          <th scope="col">NOTA 2</th>
          <th scope="col">NOTA 3</th>
          <th scope="col">PROMEDIO</th>
          <th scope="col">EDITAR NOTAS</th>
        </thead>
        <tbody> 
         
       </tbody> 
     </table>
    </div>

  </div>
</div>
<div class="row">
  
</div>
</div>

@endsection
 

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
var c=0;
//para el combobox grado
    $(document).ready(function(){
      $("#idnivel").change(function(){
        var nivel = $(this).val();
            $('#idgrado').removeAttr('disabled');
        $.get('../../gradobyniveles/'+nivel, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione un Grado</option>'
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idgrado+'">'+data[i].grado+'</option>';
              $("#idgrado").html(producto_select);

        });
      });

      //para el combobox seccion
      $("#idgrado").change(function(){
        var grado = $(this).val();
        $("#idseccion").removeAttr('disabled');
        
        $.get('../seccionesbygrados/'+grado, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione una Seccion</option>';
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idseccion+'">'+data[i].seccion+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ninguna Seccion Encontrada</option>';

            $("#idseccion").html(producto_select);

        });
        //para el combobox cursos
        $("#idseccion").change(function(){
        var seccion = $(this).val();
        $("#idcurso").removeAttr('disabled');
        $.get('../cursosbygrados/'+grado, function(data){
          console.log(data);
            var producto_select = '<option value="" disabled selected>Seleccione un Curso</option>';
            if(data.length>=1)
              for (var i=0; i<data.length;i++)
                producto_select+='<option value="'+data[i].idcurso+'">'+data[i].curso+'</option>';
            else
                producto_select+='<option value="" disabled selected>Ningun Curso Encontrado</option>';

            $("#idcurso").html(producto_select);

        });
      });
      //para el combo capacidades y el profesor de un curso
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
        //para el profesor
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

    });
  
//para mostrar las notas por capacidades xd xd xd
     
      $("#idcapacidad").change(function(){
        var capacidad = $(this).val();
        
        $.get('../notasbycapacidad/'+capacidad, function(data){
          console.log(data);
            var producto_select ;
            for (var x=0; x<c+1;x++){
            $('#fila'+x).remove();
            }
            c=0;
          
              for (var i=0; i<data.length;i++){
                 c=i;
                var ind=data[i].idnota;
              fila='<tr id="fila'+i+'"><td >'+data[i].idnota+'</td><td >'+data[i].nombres +' , '+ data[i].apellidos+'</td><td >'+data[i].nota1+'</td><td>'+data[i].nota2+'</td><td>'+data[i].nota3+'</td><td>'+data[i].promedio+'</td> <td><a class="btn btn-primary  btn-lg" href="#" onclick="Editar('+data[i].idnota+');" >Editar</a></td></tr>';
 
            	$('#tabla1').append(fila);
              fila='';
             
              }
            
        });
      });

    });

     
function Editar(idnota) {                      //para el editar una nota
      
  $.get('../Minota/'+idnota, function(data){
              
          $("#editarnota1").val(data[0].nota1);
          $("#editarnota2").val(data[0].nota2);
          $("#editarnota3").val(data[0].nota3);
          $("#idnota").val(idnota);
        });
     $('#modal_editar').modal('show');
    
     $("#editarnota1").placeholder(idnota);
       };

    
       function guardar() { 

      var  nota1=document.getElementById('editarnota1').value;
      var  nota2=document.getElementById('editarnota2').value;
      var  nota3=document.getElementById('editarnota3').value;
      var  idnota=document.getElementById('idnota').value;


       }   

</script>
 
