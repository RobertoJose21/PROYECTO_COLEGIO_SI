@extends('layouts.plantilla')

@section('contenido') 
<div class="container-fluid"> 
     <h1 style="text-align: center">Editar Alumno : {{$alumno->apellidos}},{{$alumno->nombres}}</h1>  
    <div class="alert hidden" role="alert"></div> 
    <form method="POST" action="{{ route('alumno.update', $alumno->idalumno) }}"> 
        @method('put')
        @csrf 
    <div class="row pt-3"> 
        <div class="col-md-1"> 
            <label for="">Codigo</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" maxlength="10" class="form-control" name="codigoalumno" id="codigoalumno" required value="{{ $alumno->codigoalumno }}" style="border-radius: 40px;">  
        </div> 
        <div class="col-md-1"> 
            <label for="">DNI</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" class="form-control" name="dni" id="dni" required value="{{ $alumno->dni }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-1"> 
            <label for="">Sexo</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="sexo" id="sexo" value="{{ $alumno->sexo }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-1">  
            <label for="">Fecha de Nacimiento</label> 
        </div> 
        <div class="col-md-2">  
            <div class="form-group">  
                <div class="input-group "> 
                    <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento"  style="text align:center;border-radius: 40px;" value="{{ $alumno->fechanacimiento }}"> 
                </div> 
            </div> 
        </div>
    </div> 
    <div class="row pt-3">
        <div class="col-md-1"> 
            <label for="">Apellidos</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $alumno->apellidos }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-1"> 
            <label for="">Nombres</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="nombres" id="nombres" value="{{ $alumno->nombres }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-2"> 
            <label for="">Lengua Materna</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="lenguamaterna" id="lenguamaterna" value="{{ $alumno->lenguamaterna }}" style="border-radius: 40px;">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Religion</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="religion" id="religion" value="{{ $alumno->religion }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-2"> 
            <label for="">Estado Civil</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="text" class="form-control" name="estadocivil" id="estadocivil" value="{{ $alumno->estadocivil }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-2"> 
            <label for="">Colegio de Procedencia</label>  
        </div>  
        <div class="col-md-3"> 
            <input type="text" class="form-control" name="colegioprocedencia" id="colegioprocedencia" value="{{ $alumno->colegioprocedencia }}" style="border-radius: 40px;">  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Direccion</label>  
        </div>  
        <div class="col-md-4"> 
            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $alumno->direccion }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"> 
            <label for="">Telefono</label>  
        </div>  
        <div class="col-md-2"> 
            <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $alumno->telefono }}" style="border-radius: 40px;">   
        </div>
        <div class="col-md-1"> 
            <label for="">Pais </label>  
        </div>  
        <div class="col-md-2"> 
            <select class="form-control  " style="width: 100%;border-radius: 40px;" id="idpais" name="idpais" >  
                <option value="{{$alumno->distrito->provincia->departamento->pais->idpais}}" disabled selected> PAIS ACTUAL:{{$alumno->distrito->provincia->departamento->pais->pais}}</option>
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
            <select class="form-control " style="width: 100%;border-radius: 40px;" id="iddepartamento" name="iddepartamento" disabled>  
                <option value="{{$alumno->distrito->provincia->departamento->iddepartamento}}" disabled selected>Departamento : {{$alumno->distrito->provincia->departamento->departamento}}</option>
            </select>  
        </div>
        <div class="col-md-1"> 
            <label for="">Provincia </label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control " style="width: 100%;border-radius: 40px;" id="idprovincia" name="idprovincia" disabled>  
                <option value="{{$alumno->distrito->provincia->idprovincia}}" disabled selected>Provincia : {{$alumno->distrito->provincia->provincia}}</option>  
            </select>  
        </div>
        <div class="col-md-1"> 
            <label for="">Distritos </label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control " style="width: 100%;border-radius: 40px;" id="iddistrito" name="iddistrito" disabled>  
                < <option value="{{$alumno->distrito->iddistrito}}" disabled selected>Distrito : {{$alumno->distrito->distrito}}</option>   
            </select>  
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-2" style="text-align: left"> 
            <label for="">Medio de Transporte</label>  
        </div>  
        <div class="col-md-2"> 
            <select class="form-control  " style="width: 100%;border-radius: 40px;" id="mediotransporte" name="mediotransporte" value="{{ $alumno->mediotransporte }}" >  
                <option value="A pie">A pie</option>
                <option value="MicroBus">MicroBus</option>
                <option value="Taxi">Taxi</option>
                <option value="Moto Lineal">Moto Lineal</option>
                <option value="MotoTaxi">MotoTaxi</option>
                <option value="Combi">Combi</option>
                <option value="Colectivo">Colectivo</option>
                <option value="VehiculoPropio">Vehículo Propio</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <div class="col-md-2"> 
            <label for="">Tiempo de Demora</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" min="1" name="tiempodemora" id="tiempodemora" value="{{ $alumno->tiempodemora }}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-2"> 
            <label for="">Material de Domicilio</label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control" style="width: 100%;border-radius: 40px;" id="materialdomicilio" name="materialdomicilio" value="{{ $alumno->materialdomicilio }}">  
                <option value="LADRILLO">LADRILLO</option>
                <option value="LADRILLO Y/O CEMENTO">LADRILLO Y/O CEMENTO</option>
                <option value="CEMENTO">CEMENTO</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">Energia Electrica</label>
        </div>  
        
        <div class="col-md-3" > 
            <select class="form-control" id="energiaelectrica" name="energiaelectrica" style="border-radius: 40px;" value="{{ $alumno->energiaelectrica }}" >  
                <option value="INSTALACION DOMICILIARIA">INSTALACION DOMICILIARIA</option>
                <option value="INSTALACION PUBLICA">INSTALACION PUBLICA</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <div class="col-md-1"> 
            <label for="">Agua Potable</label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control" id="aguapotable" name="aguapotable" style="border-radius: 40px;" value="{{ $alumno->aguapotable }}">  
                <option value="INSTALACION PROPIA">INSTALACION PROPIA</option>
                <option value="INSTALACION COMPARTIDA">INSTALACION COMPARTIDA</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <div class="col-md-1"> 
            <label for="">Desague</label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control" id="desague" name="desague" style="border-radius: 40px;" value="{{ $alumno->desague }}">  
                <option value="INSTALACION DOMICILIARIA">INSTALACION DOMICILIARIA</option>
                <option value="INSTALACION PUBLICA">INSTALACION PUBLICA</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-1"> 
            <label for="">SS:HH</label>  
        </div>  
        <div class="col-md-3"> 
            <select class="form-control" style="width: 100%;border-radius: 40px;" id="sshh" name="sshh" value="{{ $alumno->sshh}}">  
                <option value="INODORO SIN AGUA CORRIENTE">INODORO SIN AGUA CORRIENTE</option>
                <option value="INODORO CON AGUA CORRIENTE">INODORO CON AGUA CORRIENTE</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <div class="col-md-1"> 
            <label for="">Nro de Habitaciones</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" min="1" name="numerohabitaciones" id="numerohabitaciones" value="{{ $alumno->numerohabitaciones}}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-2"> 
            <label for="">Nro de Habitantes</label>  
        </div>  
        <div class="col-md-1"> 
            <input type="number" class="form-control" min="1" name="numerohabitantes" id="numerohabitantes" value="{{ $alumno->numerohabitantes}}" style="border-radius: 40px;">  
        </div>
        <div class="col-md-1"> 
            <label for="">Situación</label>  
        </div>  
        <div class="col-md-2">   
            <select class="form-control" style="width: 100%;border-radius: 40px;" id="situacion" name="situacion" value="{{ $alumno->situacion}}"  >  
                <option value="PROMOVIDO">PROMOVIDO</option>
                <option value="ACEPTADO">ACEPTADO</option>
                <option value="RECHAZADO">RECHAZADO</option>
                <option value="OBSERVADO">OBSERVADO</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
    </div>
    <div class="col-md-12 text-center pt-5">  
            <div class="form-group"> 
                <button class="btn btn-success" id="btnRegistrar" data-loading text="<i class='fa a-spinner fa-spin'></i> Registrando"> 
                <i class='fas fa-save'></i> EDITAR</button>    
                <a href="{{route('alumno.index')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>  
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
        
        $("#fechanacimiento").change(function (){
            
            //var x=new Date();
            var fecha = document.getElementById('fechanacimiento').value.split('-');
            //x.setFullYear(fecha[0],fecha[1]-1,fecha[2]);
            //x.setFullYear(fecha[0]);
            console.log(fecha[0]);
            //var mesescogido = fecha[1]-1;

            var today = new Date();
            var y = today.getFullYear();
            //var m = today.getMonth();
            //console.log(y-3)
            //console.log(today);
            var anioescolar= y-2 ;  
            var aniopermitido=y-18;
            //var mesescolar= m + 1;
            console.log(anioescolar);  
            //console.log(mesescolar); 
            //&& mesescogido === mesescolar (por si se desee con los meses)
                   if ( fecha[0] >= aniopermitido && fecha[0]<=anioescolar){
                            alert("La fecha introducida es correcta.");
                            $('#apellidos').removeAttr('disabled');
                            $('#nombres').removeAttr('disabled');
                        }
                    else{
                        alert("La fecha introducida No es correcta.");
                        document.getElementById('apellidos').disabled = true; 
                        document.getElementById('nombres').disabled = true;
                    }
                        
        });
    });
</script>
