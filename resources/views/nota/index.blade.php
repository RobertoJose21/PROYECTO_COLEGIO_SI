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
  <div class="row">

      <div class="col-4 text-center">
        <label for="">NIVELES</label>
            <select class="form-control" name="grado_id" id="grado_id" style="border-radius: 40px;">
                @foreach($grado as $itemgrado)
                <option value="{{$itemgrado['grado_id']}}">{{$itemgrado['namegrado']}}</option>
                @endforeach
            </select>
      </div>
      <div class="col-3 text-center">
        <label for="">PERIODO</label>
            <select class="form-control" name="periodo_id" id="periodo_id" style="border-radius: 40px;">
                @foreach($periodo as $itemperiodo)
                <option value="{{$itemperiodo['periodo_id']}}">{{$itemperiodo['periodo']}}</option>
                @endforeach
            </select>
      </div>

      <div class="col-4 text-center">
        <label for="">GRADOS</label>
            <select class="form-control" name="grado_id" id="grado_id" style="border-radius: 40px;">
                @foreach($grado as $itemgrado)
                <option value="{{$itemgrado['grado_id']}}">{{$itemgrado['namegrado']}}</option>
                @endforeach
            </select>
      </div>  
       
  </div><br>
<div class="row">
  <div class="col-2 text-center">
    <label for="">SECCIONES</label>
        <select class="form-control" name="seccion_id" id="seccion_id" style="border-radius: 40px;">
            @foreach($seccion as $itemseccion)
            <option value="{{$itemseccion['seccion_id']}}">{{$itemseccion['nameseccion']}}</option>
            @endforeach
        </select>
  </div>
  <div class="col-4 text-center">
    <label for="">CURSO</label>
        <select class="form-control" name="curso_id" id="curso_id" style="border-radius: 40px;">
            @foreach($curso as $itemcurso)
            <option value="{{$itemcurso['curso_id']}}">{{$itemcurso['namecurso']}}</option>
            @endforeach
        </select>
  </div>
  <div class="col-4" >
    <label for="id">DOCENTE</label>
    <input type="text" class="form-control"   placeholder="docente" id="docente" name="docente" style="border-radius: 10px;">
  </div>
</div><br>
<div class="row">
  <div class="col-12">
    <h3 class="text-center">LISTADO DE NOTAS</h3>
    <div class="col-12"> &nbsp;</div>
    <!--<div class="btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-primary">
        <input type="checkbox"> Text
      </label>
    </div><form class="form-inline my-2 my-lg-0 float-right col-4">
      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{$buscarpor}}">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <div class="table-responsive " style="border-radius: 12px;" >
      <table class="table">
        <thead class="thead-dark text-center"  >
          <th scope="col">ID_NOTA</th>

          <th scope="col">NOMBRES DE ESTUDIANTE</th>
          <th scope="col">NOTA 1</th>
          <th scope="col">NOTA 2</th>
          <th scope="col">NOTA 3</th>
          <th scope="col">PROMEDIO</th>
          <th scope="col">EDITAR NOTAS</th>
        </thead>
        <tbody> 
          @foreach($nota as $itemnota)
            <tr class="text-center">
              
                <td >{{$itemnota->idnota}}</td>
                
                <td>{{$itemnota->nota1}}</td>
                <td>{{$itemnota->nota2}}</td>
                <td>{{$itemnota->nota3}}</td>
                            
                <td>{{$itemnota->promedio}}</td>
                <td class="menu" data-animation="to-left">  
                    <a href="{{route('nota.edit',$itemnota->idnota)}}" > 
                      <span><b>EDITAR NOTA</b></span>
                      <span>
                        <i class="fas fa-edit" aria-hidden="true"></i>
                      </span>
                     </a>
                  
                </td>
            </tr>
          @endforeach
       </tbody> 
     </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="align-center" style="margin-left: 40%"><h5>{{$nota->links()}}</h5></div>
</div>
</div>
@endsection