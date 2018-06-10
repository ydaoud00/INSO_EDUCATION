        
@extends('layouts.app')

@section('content')
<!-- Home -->
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{url('/images/home.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="white-text">Comparte tus apuntes en linea</h1>
                    <p class="lead white-text"> Una plataforma con soporte a distintos grados educativos</p>
                    <a class="main-button icon-button" href="/register">Empieza ahora!</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Home -->

<!-- About -->
<div id="about" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <div class="section-header">
                    <h2>Bienvenido a Education</h2>
                    <p class="lead">La plataforma de intercambio de apuntes más grande de España</p>
                </div>

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-book"></i>
                    <div class="feature-content">
                        <h4> Apuntes en linea</h4>
                        <p> Puedes obtener todos los apuntes creados en tu curso</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-users"></i>
                    <div class="feature-content">
                        <h4> Profesores verificados</h4>
                        <p> Contactanos si tienes alguna duda o quieres darte de alta como profesor</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-comments"></i>
                    <div class="feature-content">
                        <h4> Valora a tus compañeros</h4>
                        <p> Puedes aportar tu valoración en los apuntes de tus compañeros </p>
                    </div>
                </div>
                <!-- /feature -->

            </div>

            <div class="col-md-6">
                <div class="about-img">
                    <img src="{{url('/images/about.png')}}" alt="">
                </div>
            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->
</div>
<!-- /About -->

<!-- Contact CTA -->
<div id="contact-cta" class="section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{url('/images/home_2.jpg')}})"></div>
    <!-- Backgound Image -->

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="white-text">Contactanos</h2>
                <p class="lead white-text"> Estamos a tu disposición para cualquier tipo de duda</p>
                <a class="main-button icon-button" href="/contact">Contactar ahora</a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact CTA -->
@endsection