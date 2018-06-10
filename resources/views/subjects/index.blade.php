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

    <div id="contact-modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Crear asignatura</h3>
          </div>
          {{ Form::open(array('url' => 'subjects')) }}
          <div class="modal-body">        
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', Input::old('name'), array('placeholder'=>'Introduce un nombre', 'class' => 'input')) }}
            @if ($errors->has('name'))
            <span class="invalid-feedback text-danger">
              <strong>{{ $errors->first('name') }}</strong> 
            </span>
            @endif
            {{ Form::label('center', 'Centro') }}
            {{ Form::text('center', $center->name, array('disabled'=>'disabled', 'class' => 'input')) }}
            {{ Form::label('grade', 'Grado') }}
            {{ Form::text('grade', $grade->name, array('disabled'=>'disabled', 'class' => 'input')) }}
            {{ Form::label('course', 'Curso') }}
            {{Form::number('course', $value = '1' , ['min' => '1', 'max' => $grade->courses])}}
            @if ($errors->has('course'))
            <span class="invalid-feedback text-danger">
              <strong>{{ $errors->first('course') }}</strong> 
            </span>
            @endif         
          </div>

          <div class="modal-footer">  
            {{ Form::submit('Crear asignatura', array('class' => 'main-button icon-button')) }}
            {{ Form::close() }}        
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="table-index">
    <a class="btn btn-info pull-right" data-toggle="modal" data-target="#contact-modal" > Nueva asignatura </a>
    <table class="table table-striped">
      <tr>
        <th class="text-center">Nombre</th>
        <th class="text-center">Centro</th>
        <th class="text-center">Grado</th>
        <th class="text-center">Acciones</th>
      </tr>

      <?php $var = 0 ; ?>
      @for ($i = 1; $i <= $grade->courses; $i++)
        @for ($j = 0; $j < $subjects->count(); $j++)
          @if ($subjects[$j]->course === $i)
          @if($var == 0)
            <tr class="text-light bg-success">
              <td colspan="4" class="text-center"> <strong> Curso {{$i}} </strong> </td>
            </tr>
            <?php $var = 1; ?>
          @endif
          <tr>
            <td class="text-center"> <a class="pull pull-right text-primary" href="{{url('/subjects/'.$subjects[$j]->id.'/files')}}">{{ $subjects[$j]->name}}</a> </td>
            <td class="text-center">{{ $center->name }}</td>
            <td class="text-center">{{ $grade->name}}</td>

            <td class="text-center">
              {{ Form::open(array('url' => 'subjects/' . $subjects[$j]->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              <button type="submit" class="btn btn-danger" >
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
          @endif
        @endfor
        <?php $var = 0; ?>
      @endfor
    </table>
  </div>
  <div class="col-lg-6 col-lg-offset-5"> {{$subjects->render()}} </div>
</div>         
</div>
</div>

@endsection