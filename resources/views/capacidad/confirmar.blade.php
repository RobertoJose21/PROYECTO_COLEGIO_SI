@extends('layouts.plantilla')

@section('contenido')
<div class="container">

	 
        
    <h1>Desea eliminar el número de la capacidad : {{$capacidad->idcapacidad}} , Capacidad : {{$capacidad->capacidad}} </h1>
		<form method="POST" action="{{ route('seccion.destroy',$capacidad->idcapacidad) }}">
		@method('delete')	
            @csrf
    
        <button  type="submit" class="btn btn-danger"><i class="fas fa-check-square" > </i>  SI       </button>
        <a href="{{ route('cancelarCapacidad')}}" class="btn btn-primary"><i class="fas fa-times-circle" > </i>NO</a>
    
		</form>	
				

</div>

@stop