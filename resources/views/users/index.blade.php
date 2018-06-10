@extends('layouts.app')

@section('content')

<div class="row row-offcanvas row-offcanvas-left">

    @include('layouts.sidebar')

    <div class="col-sm-9 col-md-10 main">
        <!--toggle sidebar button-->
        <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
        </p>
        <h4 class="page-header">
            Usuarios / listar
        </h4>

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div class= "table-index">
            <a class="btn btn-info pull-right" href="{{ url('users/create') }}" >Nuevo usuario</a>
            <table class="table table-striped">
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Centro</th>
                    <th class="text-center">Grado </th>
                    <th class="text-center">Curso </th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->role }}</td>
                    @if($user->role == 'Admin') 
                    <td class="text-center">{{"NA"}} </td>
                    <td class="text-center">{{"NA"}} </td>
                    <td class="text-center">{{"NA"}} </td>
                    @elseif($user->role == 'Profesor')
                    <td class="text-center">{{ $user->center->name }}</td>
                    <td class="text-center">{{ $user->grade->name }}</td>
                    <td class="text-center">{{"NA"}} </td>
                    @else
                    <td class="text-center">{{ $user->center->name }}</td>
                    <td class="text-center">{{ $user->grade->name }}</td>
                    <td class="text-center">{{ $user->course }}</td>
                    @endif 


                    <td class="text-center">
                        {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button type="submit" class="btn btn-danger" >
                            <i class="fa fa-trash"></i>
                        </button>
                        {{ Form::close() }}
                        <a class="btn btn-warning" href="{{ URL::to('users/' . $user->id . '/edit') }}"> <i class="fa fa-edit"></i> </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-6 col-lg-offset-5"> {{$users->render()}} </div>
    </div>
</div>

@endsection