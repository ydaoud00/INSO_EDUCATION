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

    <div class="limiter">
             <div class="bg-image bg-parallax overlay" style="background-image:url({{url('/images/home.jpg')}})"></div>

            <div class="container-login-register">
                <div class="wrap-login-register">
                    <div class="login-register-form-title" style="background-image: url({{url('/images/login.jpg')}});">
                        <ul class="hero-area-tree">
                            <li><a href="/">Home</a></li>
                            <li><a href="/a"bout>Acerca de</a></li>
                            <li><a href="/contact">Contacto</a></li>
                            <li>Login</li>
                            <li><a href="/register">Registro</a></li>
                        </ul>
                        <h2 class="white-text">Iniciar sesión</h2>
                    </div>

                    <form method="POST" class="login-register-form" action="{{ route('login') }}">
                    @csrf
                        <div class="wrap-input m-b-26">
                            <span class="label-input">Email</span>
                            <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Introduce tu correo electronico" required="">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-input m-b-26">
                            <span class="label-input">Contraseña</span>
                            <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Introduce tu contraseña">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="wrap-button" >
                            <button type="submit" class="main-button icon-button">{{ __('Entrar') }}</button>
                            <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </body>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/js.js') }}"></script>
</html>

