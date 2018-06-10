<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
  <img src="{{url('/images/usuario.png')}}" alt="">
  <p class="text-center"> {{Auth::user()->name}} ({{(Auth::user()->role)}}) </p>
  <ul class="nav nav-sidebar">
    <li class="list-group-root"><a href="/home"> <i class="feature-icon fa fa-home"></i> Menu</a></li>
    <li class="list-group-item"><a href="/home"> <i class="feature-icon fa fa-home"></i> Inicio</a></li>
  </ul>
  
  @if(Auth::user()->role == "Profesor")
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a href="{{ URL::to('users/'. Auth::user()->id)}}"> <i class="feature-icon fa fa-user"></i> Perfil</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a href="{{ URL::to('subjects')}}"> <i class="feature-icon fa fa-book"></i> Asignaturas</a></li>
  </ul>
  @elseif(Auth::user()->role == "Estudiante")
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a href="{{ URL::to('users/'. Auth::user()->id)}}"> <i class="feature-icon fa fa-user"></i> Perfil</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a> <i class="feature-icon fa fa-book"></i> Asignaturas</a></li>
    @foreach($subjects as $subject)
    <li class="list-group-item subitem"><a href="{{ URL::to('subjects/'. $subject->id . '/files')}}"> <i class="feature-icon fa fa-book"></i> {{$subject->name}}</a></li>
    @endforeach
  </ul>
  @else
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a href="{{ URL::to('centers')}}"> <i class="feature-icon fa fa-building"></i> Centros</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="list-group-item"><a href="{{ URL::to('users')}}"> <i class="feature-icon fa fa-users"></i> Usuarios</a></li>
  </ul>
  @endif

</div>