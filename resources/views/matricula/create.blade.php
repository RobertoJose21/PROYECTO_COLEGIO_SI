@extends('layouts.plantilla')

@section('contenido')

    <div class="contenido" >
                <h1>Crear Registro</h1>
                          <!--para lo que se toque-->
                <form method="POST"  action="{{route('matricula.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
                    @csrf   
                   
                 <div class="form-row">
                     <div class="form-group col-md-4">
                            <label for="fecha">fecha</label>
                                 <input type="date"  class="form-control"   id="fecha" name="fecha" >
                             
                     </div>

                     <div class="from-group col-md-4">
                        <label for="">Estudiante</label>
                        <select class="form-control" name="estudiante_id" id="estudiante_id">
                            @foreach($estudiante as $k)
                        <option value="{{$k['estudiante_id']}}">{{$k['nameestudiante']}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-11">
                            <label for="id" >Nivel</label>
                            <input type="text" class="form-control" id= "nivel" name="nivel" placeholder="nivel" >
                     
                        </div>
                                                   
                     </div>


                </div>


                <div class="form-row">
                   
                     
                     <div class="form-group col-md-4">
                           
                            <label for="">Año</label>
                                <select class="form-control" name="año" id="año" style="border-radius: 40px;">
                                    @foreach($grado as $k)
                                        <option value="{{$k['grado_id']}}">{{$k['namegrado']}}</option>
                                    @endforeach
                                </select>
                     </div>
                                                   
                
                    <div class="from-group col-md-4">
                        <label for="">Seccion</label>
                        <select class="form-control" name="nameseccion" id="nameseccion">
                            @foreach($seccion as $k)
                        <option value="{{$k['nameseccion']}}" >{{$k['nameseccion']}} </option>
                            @endforeach
                        </select>

                    </div>

              

                    <div class="form-group col-md-2">
                        <label for="escala">Escala</label>
                             <input type="text" autocomplete="off" class="form-control @error('escala') is-invalid @enderror" maxlength="1" id="escala" name="escala" >
                         @error('escala')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{$message}}</strong>
                            </span>
                        
                        @enderror
                  </div>



                
               
                    <div class="form-group col-md-4">
                        <label for="añoescolar">Año Escolar</label>
                            <input type="number" autocomplete="off" class="form-control @error('stock') is-invalid @enderror" id="añoescolar" name="añoescolar" >
                        @error('añoescolar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        
                         @enderror
                     </div>

                </div>

                    
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-save"></i>Grabar</button>
                      <a href="{{route('cancelarMatricula')}}" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </form>
    </div>
@endsection