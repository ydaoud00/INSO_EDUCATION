        
@extends('layouts.app')

@section('content')
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{url('/images/home.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="/">Home</a></li>
                    <li>Contacto</li>
                </ul>
                <h1 class="white-text">Contactanos</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- contact form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4> Envianos un mensaje </h4>
                    @if(Session::has('success'))
                       <div class="alert alert-success">
                         {{ Session::get('success') }}
                       </div>
                    @endif
                    {{ Form::open(array('url' => 'contact')) }}
                        <table class="table">
                            <tr>
                                <td> {{ Form::label('name', 'Nombre') }} </td>
                                <td> {{ Form::text('name', Input::old('name'), array('placeholder'=>'Introduce tu nombre', 'class' => 'input')) }}
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                             <tr>
                                <td> {{ Form::label('email', 'Email') }} </td>
                                <td> {{ Form::text('email', Input::old('email'), array('placeholder'=>'Introduce tu email', 'class' => 'input')) }} 
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td> {{ Form::label('body', 'Mensaje') }} </td>
                                <td> {{ Form::textarea('body', Input::old('body'), array('placeholder'=>'Introduce tu mensaje', 'class' => 'input')) }} 
                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback text-danger">
                                             <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                          
                        </table>

                    {{ Form::submit('Enviar mensaje', array('class' => 'main-button icon-button pull-right')) }}

                    {{ Form::close() }}
                </div>
            </div>
            <!-- /contact form -->

            <!-- contact information -->
            <div class="col-md-5 col-md-offset-1">
                <h4>Informacion de contacto</h4>
                <ul class="contact-details">
                    <li><i class="fa fa-envelope"></i>ydaoud00@estudiantes.unileon.es</li>
                    <li><i class="fa fa-phone"></i>652-626-657</li>
                    <li><i class="fa fa-map-marker"></i> León, España</li>
                </ul>

            </div>
            <!-- contact information -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection