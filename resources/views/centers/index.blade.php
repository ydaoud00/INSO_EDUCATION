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
            Centros / listar
        </h4>

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div class="table-index">
            <a class="btn btn-info pull-right" href="{{ url('/centers/create') }}" >Nuevo centro</a>
            <table class="table table-striped">
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Ciudad</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($centers as $center)
                <tr>
                    <td class="text-center">{{ $center->name}}</td>
                    <td class="text-center">{{ $center->city }}</td>
                    <td class="text-center">{{ $center->type}}</td>

                    <td class="text-center">
                        {{ Form::open(array('url' => 'centers/' . $center->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }} 
                        <button type="submit" class="btn btn-danger" >
                            <i class="fa fa-trash"></i>
                        </button>

                        {{ Form::close() }}
                        <a class="btn btn-warning" href="{{ URL::to('centers/' . $center->id . '/edit') }}"><i class="fa fa-edit"></i> </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>  
        <div class="col-lg-6 col-lg-offset-5"> {{$centers->render()}} </div>   
    </div>
</div>

@endsection