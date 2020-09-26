@extends('layouts.plantilla')

@section('contenido')
   
    <div class="contenido" id="portfolio" >
                <h1 >EDITAR REGISTRO </h1>
                          <!--para lo que se toque-->
                <form method="POST"  action="{{route('matricula.update',$matricula->numeromatricula)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
                    @method('put')
                    @csrf   
                    <div class="form-row">
                        <div class="form-group col-md-4" > 
                            <label for="id" >Nro Matricula</label>
                                <input type="text" class="form-control" id= "numeromatricula" name="numeromatricula" placeholder="numeromatricula" value="{{$matricula->numeromatricula}}" disabled >
                         </div>
                         
                         <div class="form-group col-md-4">
                                <label for="fecha">fecha</label>
                                     <input type="date"  class="form-control"   id="fecha" name="fecha"  value="{{$matricula->fecha}}">
                                 
                         </div>
                                                       
                    
                        <div class="from-group col-md-4">
                            <label for="">Estudiante</label>
                            <select class="form-control" name="estudiante_id" id="estudiante_id">
                                @foreach($estudiante as $k)
                            <option value="{{$k->estudiante_id}}"{{$k->estudiante_id==$matricula->estudiante_id ? 'selected':''}}>{{$k->nameestudiante}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="id" >Nivel</label>
                            <input type="text" class="form-control" id= "nivel" name="nivel" placeholder="nivel" value="{{$matricula->nivel}}" >
                     
                        </div>
                         
                         <div class="form-group col-md-4">
                               
                                <label for="">Año</label>
                                    <select class="form-control" name="año" id="año" style="border-radius: 40px;">
                                        @foreach($grado as $k)
                                            <option value="{{$k['grado_id']}}" {{$k->grado_id==$matricula->grado_id ? 'selected':''}}>{{$k['namegrado']}}</option>
                                        @endforeach
                                    </select>
                         </div>
                                
                   
                        <div class="from-group col-md-4">
                            <label for="">Seccion</label>
                            <select class="form-control" name="nameseccion" id="nameseccion">
                                @foreach($seccion as $k)
                            <option value="{{$k->nameseccion}}" {{$k->nameseccion==$matricula->nameseccion ? 'selected':''}}>{{$k->nameseccion}} </option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="from-row">

                        <div class="form-group col-md-4">
                            <label for="escala">Escala</label>
                                 <input type="text" autocomplete="off" class="form-control @error('escala') is-invalid @enderror" maxlength="1" id="escala" name="escala"  value="{{$matricula->escala}}">
                             @error('escala')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{$message}}</strong>
                                </span>
                            
                            @enderror
                         </div>

                        <div class="form-group col-md-4">
                              <label for="añoescolar">Año Escolar</label>
                                <input type="number" autocomplete="off" class="form-control @error('stock') is-invalid @enderror" id="añoescolar" name="añoescolar"  value="{{$matricula->añoescolar}}">
                              @error('añoescolar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            
                               @enderror
                         </div>


                    </div>


             <button type="submit" class="btn btn-primary" ><i class="fas fa-save" ></i>Grabar</button>
                      <a href="{{route('cancelarMatricula')}}" class="btn btn-danger"> <i class="fas fa-ban" ></i> Cancelar</a>
                </form>
    </div>
@endsection