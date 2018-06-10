@extends('layouts.app')

@section('content')

 <div class="row row-offcanvas row-offcanvas-left">

    @include('layouts.sidebar')

    <div class="col-sm-9 col-md-10 main">
        
        <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
        </p>

        <h4 class="page-header">
            Usuarios / crear
        </h4>

        {{ Form::open(array('url' => 'users', 'id' => 'formOne')) }}
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Nombre: </label>
          <div class="col-lg-8">
            {{ Form::text('name', Input::old('name'), array('placeholder'=>'Introduce el nombre del usuario', 'class' => 'form-group', 'required')) }} 
            @if ($errors->has('name'))
            <span class="invalid-feedback text-danger">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email: </label>
          <div class="col-lg-8">
            {{ Form::text('email', Input::old('email'), array('placeholder'=>'Introduce el email del usuario', 'class' => 'form-group', 'required')) }} 
            @if ($errors->has('email'))
            <span class="invalid-feedback text-danger">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Contraseña</label>
          <div class="col-lg-8">
            {{ Form::password('password', array('placeholder'=>'Introduce la contraseña del usuario', 'class' => 'form-group', 'required')) }} 
            @if ($errors->has('password'))
            <span class="invalid-feedback text-danger">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Rol:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              {{ Form::select('role', array('Estudiante' => 'Estudiante', 'Profesor' => 'Profesor'), Input::old('role'), ['id' => 'role', 'class' => 'form-group', 'required'])}} 
              @if ($errors->has('role'))
              <span class="invalid-feedback text-danger">
                <strong>{{ $errors->first('role') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Ciudad:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              {{ Form::select('city', array('Madrid' => 'Madrid', 'León' => 'León', 'Barcelona' => 'Barcelona', 'Sevilla' => 'Sevilla'), Input::old('city'), ['id' => 'center-city', 'class' => 'form-group', 'required'])}} 
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
              {{ Form::select('type', array('Colegio' => 'Colegio', 'Instituto' => 'Instituto', 'Universidad' => 'Universidad'), Input::old('type'), ['id' => 'center-type', 'class' => 'form-group', 'required'])}} 
              @if ($errors->has('type'))
              <span class="invalid-feedback text-danger">
                <strong>{{ $errors->first('type') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Centro:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              {{ Form::select('center_id', $centers, Input::old('center'), ['id' => 'center', 'class' => 'form-group', 'required'])}} 
              @if ($errors->has('center'))
              <span class="invalid-feedback text-danger">
                <strong>{{ $errors->first('center') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Grado:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              {{ Form::select('grade_id', $grades, Input::old('grade'), ['id' => 'grade', 'class' => 'form-group', 'required'])}} 
              @if ($errors->has('grade'))
              <span class="invalid-feedback text-danger">
                <strong>{{ $errors->first('grade') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group course">
          <label class="col-lg-3 control-label">Curso: </label>
          <div class="col-lg-8">
          {{Form::number('course', Input::old('course'), ['min' => '1', 'class' => 'form-group course'])}}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            {{ Form::submit('Crear usuario', array('class' => 'main-button icon-button pull-right')) }}
          </div>
        </div>

        {{ Form::close() }}
    </div>        
</div>

@endsection
