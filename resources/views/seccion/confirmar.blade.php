@extends('layouts.plantilla')

@section('contenido')
<div class="container">

	 
        
    <h1>Desea eliminar el número de la seccion : {{$seccion->idseccion}} , Seccion : {{$seccion->seccion}} </h1>
		<form method="POST" action="{{ route('seccion.destroy',$seccion->idseccion) }}">
		@method('delete')	
            @csrf
    
        <button  type="submit" class="btn btn-danger"><i class="fas fa-check-square" > </i>  SI       </button>
        <a href="{{ route('cancelarSeccion')}}" class="btn btn-primary"><i class="fas fa-times-circle" > </i>NO</a>
    
		</form>	
				

</div>

@stop