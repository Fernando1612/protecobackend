<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROTECO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/glider.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="shortcut icon" href="{{asset('img/icons/personales/logo.png')}}">

</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
  <!-- Header -->
  <header class="header header-home">
      <!-- Navbar -->
      <nav class="nav nav-home container">
        <div class="">
            <div class="d-flex">
                <a title="Programa de Tecnología en Cómputo" href="{{route('home')}}">
                    <img class="nav-logo_desk d-none d-xl-block" src="./img/logo_blanco.png" alt="Programa de Tecnología en Cómputo">
                </a>
                <a title="Universidad Nacional Autónoma de México" target="_blank" href="https://www.unam.mx/">
                    <img id="logo-unam" class="nav-logo_desk d-none d-xl-block" src="./img/UNAM.png" alt="UNAM">
                </a>
            </div>
            <a class="d-xl-none" title="Programa de Tecnología en Cómputo" href="index.html">
                <img class="nav-logo_mob" src="./img/logo_blanco.png" alt="PROTECO">
            </a>
        </div>
          <button class="nav-toggle" aria-label="Abrir menú">
              <i class="fas fa-bars"></i>
          </button>
          <ul class="nav-menu nav-home_menu">
              <li class="nav-menu_item">
                  <a href="{{route('home')}}" class="nav-menu_link nav-link " >Inicio</a>
              </li>
              <li class="nav-menu_item">
                  <a href="{{route('admin.index')}}" class="nav-menu_link nav-link" >Usuarios</a>
              </li>
              <li class="nav-menu_item">
                  <a href="{{route('cursos.index')}}" class="nav-menu_link nav-link" >Cursos</a>
              </li>
            <li class="nav-menu_item">
                  <a href="{{route('admintickets.index')}}" class="nav-menu_link nav-link" id="nav-asesorias">Tickets</a>
              </li>
              <li class="nav-menu_item">
                  <a href="{{route('adminfichas.index')}}" class="nav-menu_link nav-link" id="nav-asesorias">Fichas</a>
              </li>
                 <li class="nav-menu_item">
                      <a href="{{route('admincomprobantes.index')}}" class="nav-menu_link nav-link" id="nav-asesorias">Comprobantes</a>
                  </li>
             
                <!-- desktop -->
                <li class="nav-item dropdown nav-menu_item d-none d-md-block">
                  <div class="dropdown-nav">
                  <button class="dropbtn d-flex justify-content-center align-items-center align-content-center">{{auth()->user()->fname}} <img class="d-block mx-2" src="img/icons/generales/flecha.png" alt="" width="20"></button>
                  <div class="dropdown-content">
                    <a href="{{route('perfil.index')}}">Mi perfil</a>
                     @if(auth()->user()->role==2)
                        <a href="{{route('admin.index')}}">Administrador</a>
                        <a href="{{route('becarios.index')}}">Becario</a>
                    @elseif(auth()->user()->role==1)
                        <a href="{{route('becarios.index')}}">Becario</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </div>
                </li>
                <!-- mobile -->
                <li class="nav-menu_item d-md-none">
                    <a href="{{route('perfil.index')}}" class="nav-menu_link nav-link" >Mi perfil</a>
                </li>
                 @if(auth()->user()->role==2)
                    <li class="nav-menu_item d-md-none">
                        <a href="{{route('admin.index')}}" class="nav-menu_link nav-link" >Administrador</a>
                    </li>
                    <li class="nav-menu_item d-md-none">
                        <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" >Becario</a>
                    </li>
                @elseif(auth()->user()->role==1)
                    <li class="nav-menu_item d-md-none">
                        <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" >Becario</a>
                    </li>
                @endif
                   
                <li class="nav-menu_item d-md-none">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
          </ul>
      </nav>
  </header>
  @yield('content')


     <!-- Footer -->
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img src="img/logo_blanco.png" class="footer-logo img-fluid" alt="">
                    <img src="img/UNAM.png" class="footer-logo img-fluid unam" alt="">
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="">Contacto</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">cursosproteco@gmail.com</a></li>
                        <li><a href="#">56 1839 4983</a></li>
                        <li><a href="#">Anexo Facultad Ingeniería Edificio Q "Luis G. Valdés Vallejo Laboratorio Q220, C.U., 04510 Ciudad de México, CDMX</a></li>
                    </ul>
                </div>
                <div class="redes col-lg-4 col-md-12">
                    <h5 class="">Síguenos</h5>
                    <div class="d-flex">
                        <a href="">
                            <img src="img/fb.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/yb.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/ig.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/tw.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/in.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
     <!-- Scripts -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/glider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
