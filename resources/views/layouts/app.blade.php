<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet"/>

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    </head>

  <body>
    <!-- Header -->
    <header id="header">
      <div class="container">

        <div class="navbar-header">
          <!-- Logo -->
          <div class="navbar-brand">
            <a class="logo" href="/">
              <img src="{{url('/images/logo.png')}}" alt="">
              <span class="text--bold">EDUCATION</span>
            </a>
          </div>
          <!-- /Logo -->

          <!-- Mobile toggle -->
          <button class="navbar-toggle">
            <span></span>
          </button>
          <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
          <ul class="main-menu nav navbar-nav navbar-right">
          @guest
            <li><a href="/"> <i class="feature-icon fa fa-home"></i> Home</a></li>
            <li><a href="/about"> <i class="feature-icon fa fa-question-circle"></i> Acerca de</a></li>
            <li><a href="/contact"> <i class="feature-icon fa fa-envelope"></i> Contacto</a></li>
            <li><a href="/login"> <i class="feature-icon fa fa-sign-in"></i> Login</a></li>
            <li><a href="/register" class="register"> <i class="feature-icon fa fa-user-plus"></i>  Registrate</a></li>
          @else
            <li class="nav-item dropdown navbar-right">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }} role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="feature-icon fa fa-sign-out"></i>
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
             </li>
             <form class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Search...">
              </form>
          @endguest
          </ul>
        </nav>
        <!-- /Navigation -->

      </div>
    </header>
    <!-- /Header -->

    <main class="container-fluid">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="footer" class="section">

      <!-- container -->
      <div class="container">

        <!-- row -->
        <div class="row">

          <!-- footer logo -->
          <div class="col-md-6">
            <div class="footer-logo">
              <a class="logo" href="index.html">
                <img src="{{url('/images/logo.png')}}" alt="">
                <span class="text--bold">EDUCATION</span>
              </a>
            </div>
          </div>
          <!-- footer logo -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div id="bottom-footer" class="row">

          <!-- social -->
          <div class="col-md-4 col-md-push-8">
            <ul class="footer-social">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <!-- /social -->

          <!-- copyright -->
          <div class="col-md-8 col-md-pull-4">
            <div class="footer-copyright">
              <span> &copy; Copyright 2018. Todos los derechos reservados </span>
            </div>
          </div>
          <!-- /copyright -->

        </div>
        <!-- row -->

      </div>
      <!-- /container -->

    </footer>
    <!-- /Footer -->
  </body>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/js.js') }}"></script>
</html>