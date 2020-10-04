@extends('layouts.plantilla')

@section('contenido')
<div class="container">

	 
        
    <h1>Desea eliminar el id Periodo : {{$periodo->idperiodo}} , Periodo : {{$periodo->periodo}} </h1>
		<form method="POST" action="{{ route('seccion.destroy',$periodo->idperiodo) }}">
		@method('delete')	
            @csrf
    
        <button  type="submit" class="btn btn-danger"><i class="fas fa-check-square" > </i>  SI       </button>
        <a href="{{ route('cancelarPeriodo')}}" class="btn btn-primary"><i class="fas fa-times-circle" > </i>NO</a>
    
		</form>	
				

</div>

@stop