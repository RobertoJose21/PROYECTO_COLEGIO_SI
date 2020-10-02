
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

   <h3>ASIGNAR UNA NUEVA CATEDRA</h3>

   @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
   <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
     {{ session('datos') }}
       <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
 </div>
@endif
    <form method="POST"  action="{{route('catedra.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
        @csrf   
<div class="form-group"> 
    
<div class="row">
    <div class="col"></div>
    <div class="  col-3 text-center">
        <label for="">PROFESORES</label>
            <select class="form-control" name="idprofesor" id="idprofesor" style="border-radius: 40px;">
              <option value="" disabled selected>Seleccione un Profesor</option>
                @foreach($profesor as $itemprof)
                <option value="{{$itemprof['idprofesor']}}">{{$itemprof['profesor']}}</option>
                @endforeach
            </select>
      </div>
    <div class="col"></div>
</div>
<br><br>
    

<div class="row  " style="text-align: center">
<div class="  col-3 text-center">
    <label for="">NIVELES</label>
        <select class="form-control" name="idnivel" id="idnivel" style="border-radius: 40px;">
          <option value="" disabled selected>Seleccione un Nivel</option>
            @foreach($nivel as $itemnivel)
            <option value="{{$itemnivel['idnivel']}}">{{$itemnivel['nivel']}}</option>
            @endforeach
        </select>
  </div>
  

  <div class=" col-3 text-center">
    <label for="">GRADOS</label>
         
          <select  name="idgrado" id="idgrado"  class="form-control" style="border-radius: 40px;" disabled required>
            <option value="" selected>Seleccione un Grado</option>
        </select>
        
  </div>  
   
  
<div class="  col-3 text-center">
    <label for="">CURSO</label>
        <select class="form-control" name="idcurso" id="idcurso" style="border-radius: 40px;" onchange="agregar();" disabled required>
          <option value="" selected>Seleccione un Curso</option> 
          
        </select>
    </div>

</div>
<br><br>
 
 
<div class="col-xs-12">
    <table id="detalle" class="table table-condensed table-bordred">
        <tr class="bg-danger ">
            <td>Id Curso</td>
            <td>Curso</td>
            <td>Accion</td>
        </tr>
    </table>
</div>
 
</div>
<br>
<div class="row" style="text-align: center"><div class="col-12">
    <input type="submit" value="Grabar" id="Grabar" class="btn btn-success" onclick="return confirm('Grabar ?')">&nbsp<a href="{{route('catedra.index')}}" class="btn btn-primary">Volver</a>
	<br> 
    </div> </div>
	
</div>
</form>

@endsection



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script type="text/javascript">
    var c=0;
    //para el combobox grado
        $(document).ready(function(){
          $("#idnivel").change(function(){
            var nivel = $(this).val();
                $('#idgrado').removeAttr('disabled');
            $.get('../../../gradobyniveles/'+nivel, function(data){
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
            
            
            $("#idcurso").removeAttr('disabled');
            $.get('../cursosbygrados/'+grado, function(data){
              console.log(data);
                var producto_select = '<option value="" disabled selected>Seleccione un Curso</option>';
                if(data.length>=1)
                  for (var i=0; i<data.length;i++)
                    producto_select+='<option value="'+data[i].idcurso+"_"+data[i].curso+'">'+data[i].curso+'</option>';
                else
                    producto_select+='<option value="" disabled selected>Ningun Curso Encontrado</option>';
    
                $("#idcurso").html(producto_select);
    
            });
            
        });
        botonE();
    });


	var indice=0;
	var sumacred=0;
	codigos=[];
	 
 

	 
	function agregar()
	{sumacred=0;

		datoscurso=document.getElementById('idcurso').value.split('_');
		 
		for(c in codigos)
		{
			if(datoscurso[0]==codigos[c])
			{ 	alert("Curso ya Seleccionado");
				return false;
			}
		}
		
		codigos[indice]=datoscurso[0];
	 
		datoscurso=document.getElementById('idcurso').value.split('_');
		fila='<tr id="fila'+indice+'"><td ><input  type="hidden" name="idcursos[]" value="'+datoscurso[0]+'">'+datoscurso[0]+'</td><td>'+datoscurso[1]+'</td><td ><a class="text-danger" href="#" onclick="quitar('+indice+')">Quitar</a></td></tr>';
		$('#detalle').append(fila);	
		
		indice++;
	 
		botonE();
	}	

	function quitar(item)
	{	sumacred=0;
		codigos[item]="";
		
		$('#fila'+item).remove();
		
		indice--;
		
		botonE();
		return false;
	}

	function botonE() {
        if(indice==0) { 
            document.getElementById('Grabar').disabled = true; 
        } else { 
            document.getElementById('Grabar').disabled = false;
        }
    }
</script>
