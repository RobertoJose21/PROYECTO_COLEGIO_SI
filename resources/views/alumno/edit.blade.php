@extends('layouts.plantilla')

@section('contenido') 
<div class="container-fluid"> 
     <h1>Editar Alumno : {{$alumno->apellidos}},{{$alumno->nombres}}</h1>  
    <div class="alert hidden" role="alert"></div> 
    <form method="POST" action="{{ route('alumno.update', $alumno->idalumno) }}"> 
        @method('put')
        @csrf 
    <div class="row pt-3"> 
        <div class="col-md-1"> 
            <label for="">Codigo</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" maxlength="10" class="form-control" name="codigoalumno" id="codigoalumno" required value="{{ $alumno->codigoalumno }}">  
        </div> 
        <div class="col-md-1"> 
            <label for="">DNI</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" class="form-control" name="dni" id="dni" required value="{{ $alumno->dni }}">  
        </div>
        <div class="col-md-1"> 
            <label for="">Sexo</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="sexo" id="sexo" value="{{ $alumno->sexo }}">  
        </div>
        <div class="col-md-1">  
            <label for="">Fecha de Nacimiento</label> 
        </div> 
        <div class="col-md-2">  
            <div class="form-group">  
                <div class="input-group "> 
                    <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento"  style="text align:center;" value="{{ $alumno->fechanacimiento }}"> 
                </div> 
            </div> 
        </div>
    </div> 
    <div class="row pt-3">
        <div class="col-md-1"> 
            <label for="">Apellidos</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $alumno->apellidos }}">  
        </div>
        <div class="col-md-1"> 
            <label for="">Nombres</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="nombres" id="nombres" value="{{ $alumno->nombres }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Lengua Materna</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="lenguamaterna" id="lenguamaterna" value="{{ $alumno->lenguamaterna }}">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Religion</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="religion" id="religion" value="{{ $alumno->religion }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Estado Civil</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="estadocivil" id="estadocivil" value="{{ $alumno->estadocivil }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Colegio de Procedencia</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="colegioprocedencia" id="colegioprocedencia" value="{{ $alumno->colegioprocedencia }}">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Direccion</label>  
        </div>  
        <div class="col-md-4"> 
            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $alumno->direccion }}">  
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"> 
            <label for="">Telefono</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $alumno->telefono }}">  
        </div>
        <div class="col-md-1"> 
            <label for="">Pais </label>  
        </div>  
        <div class="col-md-2"> 
            <select class="form-control  " style="width: 100%;" id="idpais" name="idpais" >  
                <option value="" disabled selected>Seleccione un Pais</option>
                @foreach($pais as $itempais) 
                    <option value="{{ $itempais['idpais']}}">{{ $itempais['pais']}}</option>  
                @endforeach  
            </select>  
        </div> 
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Departamento </label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control  " style="width: 100%;" id="iddepartamento" name="iddepartamento" disabled>  
                <option value=""  selected>-Seleccione un Departamento-</option>
            </select>  
        </div>
        <div class="col-md-1"> 
            <label for="">Provincia </label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control " style="width: 100%;" id="idprovincia" name="idprovincia" disabled>  
                <option value="" selected>-Seleccione una Provincia-</option>  
            </select>  
        </div>
        <div class="col-md-1"> 
            <label for="">Distritos </label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control " style="width: 100%;" id="iddistrito" name="iddistrito" disabled>  
                < <option value="" selected>-Seleccione un Distrito-(Provincia actual: {{$alumno->distrito}})</option>   
            </select>  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-2" style="text-align: left"> 
            <label for="">Medio de</label>  
            <label for="">Transporte</label>
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="mediotransporte" id="mediotransporte" value="{{ $alumno->mediotransporte }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Tiempo de Demora</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" name="tiempodemora" id="tiempodemora" value="{{ $alumno->tiempodemora }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Material de Domicilio</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="materialdomicilio" id="materialdomicilio" value="{{ $alumno->materialdomicilio }}">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-2" style="text-align: left"> 
            <label for="">Energia</label>
            <label for="">Electrica</label>  
        </div>  
        
        <div class="col-md-3" > 
            <input type="text" class="form-control" name="energiaelectrica" id="energiaelectrica" value="{{ $alumno->energiaelectrica }}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Agua Potable</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="aguapotable" id="aguapotable" value="{{ $alumno->aguapotable }}">  
        </div>
        <div class="col-md-1"> 
            <label for="">Desague</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="desague" id="desague" value="{{ $alumno->desague }}">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">SS:HH</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="sshh" id="sshh" value="{{ $alumno->sshh}}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Nro de Habitaciones</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" name="numerohabitaciones" id="numerohabitaciones" value="{{ $alumno->numerohabitaciones}}">  
        </div>
        <div class="col-md-2"> 
            <label for="">Nro de Habitantes</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" name="numerohabitantes" id="numerohabitantes" value="{{ $alumno->numerohabitantes}}">  
        </div>
        <div class="col-md-1"> 
            <label for="">Situación</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="situacion" id="situacion" value="{{ $alumno->situacion}}">  
        </div>
    </div>
    <div class="col-md-12 text-center pt-5">  
            <div class="form-group"> 
                <button class="btn btn-success" id="btnRegistrar" data-loading text="<i class='fa a-spinner fa-spin'></i> Registrando"> 
                <i class='fas fa-save'></i> EDITAR</button>    
                <a href="{{URL::to('alumno')}}" class='btn btn-danger'><i class='fas fa ban'></i> Cancelar</a>  
            </div>  
    </div> 

@endsection    

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        $("#idpais").change(function(){
        var pais = $(this).val();
            $('#iddepartamento').removeAttr('disabled');
        $.get('/paisdepartamento/'+pais, function(data){
          console.log(data);
            var departamento_select = '<option value="" disabled selected>-Seleccione un Departamento-</option>'
              for (var i=0; i<data.length;i++)
                departamento_select+='<option value="'+data[i].iddepartamento+'">'+data[i].departamento+'</option>';
              $("#iddepartamento").html(departamento_select);

            });
   
        });

        $("#iddepartamento").change(function(){
        var departamento = $(this).val();
            $('#idprovincia').removeAttr('disabled');
        $.get('/departamentoprovincia/'+departamento, function(data){
          console.log(data);
            var provincia_select = '<option value="" disabled selected>-Seleccione una Provincia-</option>'
              for (var i=0; i<data.length;i++)
                provincia_select+='<option value="'+data[i].idprovincia+'">'+data[i].provincia+'</option>';
              $("#idprovincia").html(provincia_select);

            });
        });

        $("#idprovincia").change(function(){
        var provincia = $(this).val();
            $('#iddistrito').removeAttr('disabled');
        $.get('/provinciadistrito/'+provincia, function(data){
          console.log(data);
            var distrito_select = '<option value="" disabled selected>-Seleccione un Distrito-</option>'
              for (var i=0; i<data.length;i++)
                distrito_select+='<option value="'+data[i].iddistrito+'">'+data[i].distrito+'</option>';
              $("#iddistrito").html(distrito_select);

            });
        });
        
    });
</script>
