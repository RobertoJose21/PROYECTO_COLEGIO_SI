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
    <h3>LISTA DE CATEDRAS - REGISTRADAS</h3>
<div class="row" style="text-align: center">
    <div class="col"> 
        <label for="obra">CURSO</label>

        <select type="text" name="idtipodeobra" class="browser-default custom-select" required="">
            @foreach($cursos as $curso)
                <option value="{{$curso->idcurso}}" 
                @if($catedra[0]->idcurso==$curso->idcurso)
                    selected="selected"
                @endif
                >{{$curso->curso}}</option>
            @endforeach
        </select>

    </div>
    <div class="col"> 
        <label for="obra">PROFESOR</label>

        <select type="text" name="idtipodeobra" class="browser-default custom-select" required="">
            @foreach($profesores as $profesor)
                <option value="{{$profesor->idprofesor}}" 
                @if($catedra[0]->idprofesor==$profesor->idprofesor)
                    selected="selected"
                @endif
                >{{$profesor->profesor}}</option>
            @endforeach
        </select>

    </div>
</div>


    
</div>


@endsection