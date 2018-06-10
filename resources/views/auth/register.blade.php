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
                        <li> <a href="/login">Login</a> </li>
                        <li>Registro</li>
                    </ul>
                    <h2 class="white-text">Registro</h2>
                    </div>

                    <form method="POST" class="login-register-form" action="{{ route('register') }}">
                    @csrf

                        <div class="wrap-input  m-b-26">
                            <span class="label-input">Nombre</span>
                            <input id="name" type="text" class="input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Introduce tu nombre" required="">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-input  m-b-26">
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

                        <div class="wrap-input m-b-26">
                            <span class="label-input">Rol</span>
                            <select id="role" class="input form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" required>
                                <option value="Estudiante" selected> Estudiante </option>
                                <option value="Profesor"> Profesor </option>
                            </select>

                            @if ($errors->has('role'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-input m-b-26">
                            <span class="label-input">Ciudad</span>
                            <select id="center-city" class="input form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required>
                                <option value="Madrid" selected=""> Madrid </option>
                                <option value="León"> León </option>
                                <option value="Barcelona"> Barcelona </option>
                                <option value="Sevilla"> Sevilla </option>
                            </select>

                            @if ($errors->has('city'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                         <div class="wrap-input m-b-26">
                            <span class="label-input">Tipo</span>
                            <select id="center-type" class="input form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" required>
                                <option value="Colegio" selected=""> Colegio </option>
                                <option value="Instituto"> Instituto </option>
                                <option value="Universidad"> Universidad </option>
                            </select>

                            @if ($errors->has('type'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-input m-b-26">
                            <span class="label-input">Centro</span>
                            <select id="center" class="input form-control{{ $errors->has('center') ? ' is-invalid' : '' }}" name="center_id" required>
                                @foreach($centers as $center)
                                    <option value="{{$center->id}}"> {{$center->name}} </option>
                                @endforeach
                            </select>

                            @if ($errors->has('center'))
                                <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('center') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="wrap-input m-b-26">
                            <span class="label-input">Grado</span>
                            <select id="grade" class="input form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade_id" required>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}"> {{$grade->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="wrap-input m-b-26 course">
                            <span class="label-input">Curso</span>
                            <input type="number" id="course" class="input form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" name="course" min="1">
                        </div>

            
                        <div class="wrap-button" >
                            <button type="submit" class="main-button icon-button">{{ __('Registrar') }}</button>
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