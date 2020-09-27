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
                    @foreach($alumno as $itemalumno)
                    <option value="{{$itemalumno['idalumno']}}">{{$itemalumno['nombres']}}, {{$itemalumno['apellidos']}}</option>
                    @endforeach
                </select>
          </div>
          <div class="col-4 text-center">
            <label for="">Matricula</label>
            <select class="form-control  text-success" name="idmatricula" id="idmatricula" style="border-radius: 40px;">
                @foreach($matricula as $itemmatricula)
                <option value="{{$itemmatricula['idmatricula']}}">{{$itemmatricula['idmatricula']}}</option>
                @endforeach
            </select>   
        </div>
          <div class="col-4 text-center"  >
            <label for="">CAPACIDADES</label>
                <select class="form-control  text-success" name="idcapacidad" id="idcapacidad" style="border-radius: 40px;">
                    @foreach($capacidad as $itemcapacidad)
                    <option value="{{$itemcapacidad['idcapacidad']}}">{{$itemcapacidad['capacidad']}}</option>
                    @endforeach
                </select>
          </div>
          
          
            <div class="form-group col-md-3 text-center ">
                <label for="id">NOTA - 1</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success"  placeholder="0" id="nota1" name="nota1" value="">
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id">NOTA - 2</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success"  placeholder="0" id="nota2" name="nota2" value="">
            </div>
            <div class="form-group col-md-3 text-center">
                <label for="id" >NOTA - 3</label>
                <input type="number" min="0" max="20" step="0.1" class="form-control  text-success"  placeholder="0" id="nota3" name="nota3" value="">
            </div>
             
        </div>
    
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> GRABAR</button>
        <a href="{{route('cancelarnota')}}" class="btn btn-danger"><i class="fas fa-ban"></i>CANCELAR</a>
    </form>
</div>
@endsection