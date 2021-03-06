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
            Centros / crear
        </h4>
        {{ Form::open(array('url' => 'centers')) }}
            <div class="form-group">
                <label class="col-lg-3 control-label">Nombre: </label>
                <div class="col-lg-8">
                    {{ Form::text('name', Input::old('name'), array('placeholder'=>'Introduce el nombre del centro', 'class' => 'form-group', 'required')) }} 
                    @if ($errors->has('name'))
                        <span class="invalid-feedback text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Ciudad:</label>
                <div class="col-lg-8">
                  <div class="ui-select">
                    {{ Form::select('city', array('Madrid' => 'Madrid', 'León' => 'León', 'Barcelona' => 'Barcelona', 'Sevilla' => 'Sevilla'), Input::old('city'), ['id' => 'city', 'class' => 'form-group', 'required'])}} 
                    @if ($errors->has('city'))
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Tipo de centro:</label>
                <div class="col-lg-8">
                  <div class="ui-select">
                    {{ Form::select('type', array('Colegio' => 'Colegio', 'Instituto' => 'Instituto', 'Universidad' => 'Universidad'), Input::old('type'), ['id' => 'type', 'class' => 'form-group', 'required'])}} 
                    @if ($errors->has('type'))
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  {{ Form::submit('Crear centro', array('class' => 'main-button icon-button pull-right')) }}
                </div>
              </div>
          
        {{ Form::close() }}
    </div>        
</div>

@endsection
