@extends('layouts.plantilla')

@section('contenido')
<div class="container">

	 
        
    <h1>Desea eliminar el número de la matrícula : {{$matricula->numeromatricula}} , código del educando : {{$matricula->estudiante_id}} </h1>
		<form method="POST" action="{{ route('matricula.destroy',$matricula->numeromatricula) }}">
		@method('delete')	
            @csrf
    
        <button  type="submit" class="btn btn-danger"><i class="fas fa-check-square" > </i>  SI       </button>
        <a href="{{ route('cancelarMatricula')}}" class="btn btn-primary"><i class="fas fa-times-circle" > </i>NO</a>
    
		</form>	
				

</div>

@stop