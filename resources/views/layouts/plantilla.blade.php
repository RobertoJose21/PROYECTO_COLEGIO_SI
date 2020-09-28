<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8" />
 <link rel="apple-touch-icon" sizes="76x76"  href="/img/apple-icon.png">
 <link rel="icon" type="image/png" href="/img/centrotpf.png">  <!--logo arriba--> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    THE ONE
  </title>
   
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="../js/fontawesome-free/css/all.min.css">
 
  <!--    FUENTESITAS E ICONOS     -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"  />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS  el now es para el filtro-->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/now-ui-kit.css?v=1.3.0">  
  <link rel="stylesheet" href="/css/demo.css">
  <!-- LOGIN PROF -->

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  
 
 
 
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
 
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/css/login.css">
  <link rel="stylesheet" href="/css/style.css">
  <!-- MENÚ -->

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="/css/bootstrap02.min.css" >

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="/css/all.min.css"  type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" type="text/css">
  <link rel="stylesheet" href="/css/simple-line-icons.css" >

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/stylish-portfolio.min.css" >

</head>

<body class="login-page sidebar-collapse">
 <!-- NAV BARRA -->






 <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400" >

    <div class="collapse navbar-collapse justify-content-start" filter-color="black" id="navigation"  filter-color="black" >
        <ul class="navbar-nav">
        
          
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Inicio" data-placement="bottom" href="/inicio">
                <img class="img-fluid" src="img/inicio.png">
                
                 
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Registro de Matriculas" data-placement="bottom" href="/matricula">
              <h5> MATRICULAS</h5>
                
             
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" rel="tooltip" title="Registro de Notas" data-placement="bottom" href="/nota">
              <h5>NOTAS</h5>
            </a>
          </li>

         
        </ul>
      </div>

      <div class="content-section-heading "style="text-align: center" >

        
        <a class="navbar-brand" href="#" rel="tooltip" title="Hemos trabajado mucho en este proyecto" data-placement="bottom" >
            
            <div class="h5 "> ⭐ BIENVENIDO A EL PROYECTO DE SISTEMAS DE INFORMACIÓN⭐ </div>
                  </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      
      <div class="collapse navbar-collapse justify-content-end  " filter-color="black" id="navigation"  filter-color="black" >
        <ul class="navbar-nav">
        
          
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Salir" data-placement="bottom" href="../" >
                <img class="img-fluid" src="img/salir.png">
                
                
            </a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- FIN  NAVBARRA -->

  <div class="page-header clear-filter" filter-color="black"> <!-- inidio y fin de fondo  -->
    <div class="page-header-image" style="background-image:url(/img/innova.jpg)"> </div> <!-- fondo  -->
    <!-- centro -->
    <body id="page-top">

       
      
        <!-- Header -->
        <header >
       
          <div class="container text-center my-auto">
            <br> <br>    <br><br><br> <br><br><br> <br>   <br>  <br><br><br> 

            <h1 class="mb-1">COLEGIO INNOVA SCHOOLS</h1> 
            <h3 class="mb-5">
              <em>De genios para genios </em>
            </h3>
          </div>
          
          <div class="overlay"></div>
        </header>
    </div>

      
        
    <div class="page-header clear-filter" filter-color="black">
      <div class="page-header-image" style="background-image:url(/img/portfolio-1.jpg)"> </div> <!-- fondo  -->
      <div class="content">
        <div class="container">
        
                  <section class="content"><!-- aquí va la tabla -->
                    @yield ('contenido')
                  </section>
              
             
            </div>
          </div>
        </div>

        
      
       
        <!--  MENU scripts-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>
       <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="../js/jquery-ui/jquery-ui.min.js"></script>
        <script src="/adminlte/dist/js/menu/jquery.min.js"></script>
        <script src="/adminlte/dist/js/menu/bootstrap.bundle.min.js"></script>
        <script src="../js/ekko-lightbox/ekko-lightbox.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="/adminlte/dist/js/menu/jquery.easing.min.js"></script>
        <script src="../js/filterizr/jquery.filterizr.min.js"></script>
        <!-- Custom scripts for this template -->
        <script src="/adminlte/dist/js/menu/stylish-portfolio.min.js"></script>
</body>
 
  
  </div>
  <!--   Core JS ARCCHIVOS   -->

  <script src="/adminlte/dist/js/core/jquery.min.js"></script>        
  <script src="/adminlte/dist/js/core/popper.min.js"></script>        
  <script src="/adminlte/dist/js/core/bootstrap.min.js"></script>        
 
 
  <!-- CENTRO DE EFECTOS Y SCRIPTS-->
  <script src="/adminlte/dist/js/now-ui-kit.js?v=1.3.0"></script>        
  <!-- LOGIN PROF-->

       <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/dist/js/adminlte.min.js"></script>  




</body>

</html>