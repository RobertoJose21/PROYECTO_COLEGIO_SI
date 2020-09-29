@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0"> ✔ Elige una de las opciones ✔</h3>
      <br>
    </div>
    <div class="row no-gutters">

      <div class="col-lg-6">
        <a class="portfolio-item" href="/matricula">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">MATRICULAS</div>
              <p class="mb-0">Realiza la matricula, ahora!</p>
            </div>
          </div>
          <img class="img-fluid" src="img/matriculas.jpg" alt="">
        </a>
      </div>

      <div class="col-lg-6">
        <a class="portfolio-item" href="/nota">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">NOTAS</div>
              <p class="mb-0">Verifica el registro de notas</p>
            </div>
          </div>
          <img class="img-fluid" src="img/colegiofondo01.jpg" alt="">
        </a>
      </div>          
      
    </div>
    <div class="row no-gutters">
      <div class="col-lg-6">
        <a class="portfolio-item" href="/alumno">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">ALUMNO</div>
              <p class="mb-0">Registra aquí los Alumnos</p>
            </div>
          </div>
          <img class="img-fluid" src="img/colegiofondo01.jpg" alt="">
        </a>
      </div>
    </div>
  </div>

@endsection
