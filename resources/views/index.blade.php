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
  <!--    FUENTESITAS E ICONOS     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"  />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS  -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/now-ui-kit.css?v=1.3.0">
  <link rel="stylesheet" href="css/demo.css">

  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="login-page sidebar-collapse">
  <!-- NAV BARRA -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">

    

 
      <div class="dropdown button-dropdown">
       
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-header">GRUPO N°01</a>
          <a class="dropdown-item" href="#">⭐ ATAUCURI YNFANTE, ISAAC DANIEL </a>
          <a class="dropdown-item" href="#">⭐ BRAÚL PORRAS, RICHARD ROBERT </a>
          <a class="dropdown-item" href="#">⭐ MACHUCA IPARRAGUIRRE, LEODAN </a>
          <a class="dropdown-item" href="#">⭐ VALDIVIA RAMOS, ROBERTO JOSE </a>
          <a class="dropdown-item" href="#">⭐ VILLARROEL RODRIGUEZ, LEANDRO </a>
        </div>
      </div>

      <div class="navbar-translate">
      <a class="navbar-brand" href="/integrantes" rel="tooltip" title="Hemos trabajado mucho en este proyecto" data-placement="bottom" >
          INTEGRANTES Y GRANDES AMIGOS
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
    
      <div class="collapse navbar-collapse justify-content-end" filter-color="#8ce1fd" id="navigation"   >
        
        <ul class="navbar-nav">
        
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="No te pierdas este sensual Twitter" data-placement="bottom" href="https://twitter.com/InnovaSchoolsPE" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Mira este latigable Facebook" data-placement="bottom" href="https://web.facebook.com/innovaschools/?_rdc=1&_rdr" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Un exquisito Instagram" data-placement="bottom" href="https://www.https://www.instagram.com/innovaschoolsperu/" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  <!-- FIN  NAVBARRA -->
  <div class="page-header clear-filter" filter-color="black">
    
    <div class="page-header-image" data-video-mobile="no" data-width="1280" data-height="720"
     data-fallback="https://www.innovaschools.edu.pe/wp-content/uploads/2017/03/Mobile-Home.jpg" 
     data-mp4="https://www.innovaschools.edu.pe/wp-content/uploads/2018/09/video_home_innova.mp4"
      data-mp4-type="video/mp4" data-webm-type="video/webm"><video autoplay="" loop="" muted="" 
      playsinline="" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
      style="background: url(&quot;https://www.innovaschools.edu.pe/wp-content/uploads/2017/03/Mobile-Home.jpg&quot;) 
      center center / cover no-repeat transparent; height: 772px; left: -245px; top: 0px; width: 1372px;">
      <source src="https://www.innovaschools.edu.pe/wp-content/uploads/2018/09/video_home_innova.mp4"
       type="video/mp4"></video></div>
    <div class="content">
      
      <div class="container">


        
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">


            <form method="POST"  action="{{ route ('user.login') }}"  >                         
              @csrf  

              <div class="card-header text-center">
                <div class="logo">
                  <img src="{{asset('/img/www.png')}}" alt="">  <!-- logo central -->
                </div>
              </div>


              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">USUARIO:</label>
                 <div class="input-icon">
                     <i class="fas fa-user"></i>
                     <input class="form-control @error('name') is-invalid @enderror"  type="text"  placeholder="Ingrese usuario" id="name" name="name" value="{{old('name')}}"/>                        
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>
                     @enderror
                  </div>
             </div>
             <div class="form-group">
              <label class="control-label">CONTRASEÑA:</label>
              <div class="input-icon">
                     <i class="fas fa-lock"></i>
                  <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Ingrese contraseña"  id="password" name="password"  value="{{old('password')}}"/>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
                  @enderror
              </div>
          </div>                


              </div>
              <div class="card-footer text-center">
                <hr />

                      <div class="form-actions">
                          <button class="btn btn-success btn-block">
                               Ingresar </button>
                      </div>
                      <br>


                <hr />
                <div class="pull-left">
                  <h6>
                    <a href="{{ route('cuenta.create') }}" class="link">Crea tu cuenta aquí! 😏</a>
                  </h6>
                   
                </div>
                <div class="pull-right">
                  <h6>
                    <a href="#" class="link" title="Contactese con el area de sistemas del colegio">Necesitas ayuda? 😭 </a>
                  </h6>
                </div>
                
                
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class=" container ">
        <nav>
          <ul>
        <!--   POR SI AGREGAMOS ALGO MÁS A FUTURO  -->



          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Diseñado por el Grupo N°01
          
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS ARCCHIVOS   -->

  <script src="/adminlte/dist/js/core/jquery.min.js"></script>        
  <script src="/adminlte/dist/js/core/popper.min.js"></script>        
  <script src="/adminlte/dist/js/core/bootstrap.min.js"></script>        
  
  <!--  Google Maps ESTE SCRIPT SOLO LO PEGUÉ xdddd    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- CENTRO DE EFECTOS Y SCRIPTS-->
  <script src="/adminlte/dist/js/now-ui-kit.js?v=1.3.0"></script>        

       <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/dist/js/adminlte.min.js"></script>  
</body>

</html>