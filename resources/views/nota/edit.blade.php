@extends('layouts.plantilla')

@section('contenido')

<div class="container">
    <h2> EDITAR NOTA DEL ALUMNO -  </h2>
<form method="POST" action="{{route('nota.update',$nota->idnota)}}">
    @method('put')
        @csrf

        <div class="form-row">
            
            <div class="form-group col-md-3 text-center">
                <label for="id">NOTA - 1</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control"  placeholder="{{$nota->nota1}}" id="nota1" name="nota1" value="{{$nota->nota1}}">
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id">NOTA - 2</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control"  placeholder="{{$nota->nota2}}" id="nota2" name="nota2" value="{{$nota->nota2}}">
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id" >NOTA - 3</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control"  placeholder="{{$nota->nota3}}" id="nota3" name="nota3" value="{{$nota->nota3}}">
            </div>
             
        </div>
    
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> GRABAR</button>
        <a href="{{route('cancelarnota')}}" class="btn btn-danger"><i class="fas fa-ban"></i>CANCELAR</a>
    </form>
</div>
@endsection