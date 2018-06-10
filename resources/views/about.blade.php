        
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
                    <li>  Acerca de </li>
                </ul>
                <h1 class="white-text">Conócenos</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->
<!-- Contact -->
<div id="about" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <table>
                <tr>
                    <td>
                        <img class="img-responsive about-us-img pull-left"  src="{{url('/images/me.png')}}">
                    
                        <p>Yassine Daoudi, estudiante de cuarto curso en Ingeniería Informática en la Escuela de Ingeniería Industrial e Informática de la Universidad de León. No soy tan complicado como para huir ,ni quedarme aquí en silencio , pero no soy tan simple como para no advertir que no hay tres minutos, ni hay cien palabras que me puedan definir.<p>
                            
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>  
                        <img class="mg-responsive about-us-img" src="{{url('/images/app.png')}}">
                        <p> Education es una aplicación para compartir apuntes entre los estudiantes y profesores de difrentes grados educativos con el fin de incentivar mejor la educación. El proyecto surge como una propuesta para la parte práctica de la asignatura de Ingeniería de Software en la Escuela de Ingeniería Industrial e Informática de la Universidad de León. </p>                         
                    </td>
                </tr>

                <tr>
                    <td>
                        <img class="img-responsive about-us-img pull-left"  src="{{url('/images/goal.png')}}">
                        <p> El objetivo de la aplicación de Education es aportar ideas a las distintas personas que visualizarán esta propuesta de que debemos involucrarnos más en la distribución de la educación que hemos aprendido a otras personas. Otro de los objetivos también seria intentar sacar la maxima puntuación en la evaluación de la parte práctica por parte de los profesores de la asignatura. </p>    
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>

@endsection