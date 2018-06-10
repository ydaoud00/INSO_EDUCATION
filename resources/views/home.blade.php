@extends('layouts.app')

@section('content')

<div class="row row-offcanvas row-offcanvas-left">
    
    @include('layouts.sidebar')

   <div class="col-sm-9 col-md-10 main">
        <!--toggle sidebar button-->
        <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
        </p>

        <div class="panel">
            <div class="cover-photo">
              <div class="fb-timeline-img">
                  <img src="{{url('/images/portada.png')}}" alt="">
              </div>
              <div class="fb-name">
                  <h2><a href="#">{{Auth::user()->name}}</a></h2>
              </div>
            </div>
            <div class="panel-body">
              <div class="profile-thumb">
                  <img src="{{url('/images/usuario.png')}}" alt="">
              </div>
              @if(Auth::user()->role =! 'Admin')
                  <p> {{Auth::user()->center->name}} </p>
              @endif
            </div>
        </div>

        @foreach ($files as $file)

          <div class="panel">
            <div class="panel-body">
              <a class="pull pull-right text-primary" href="{{url('/subjects/'.$file->subject->id.'/files')}}">{{$file->subject->name}}</a>
              <div class="fb-user-thumb">
                  <img src="{{url('/images/usuario.png')}}" alt="">
              </div>
              <div class="fb-user-details">
                  <h3><a href="#" class="#">{{$file->user->name}}</a></h3>
                  <p>{{$file->created_at}}</p>
              </div>

              <div class="clearfix"></div>
              <p class="fb-user-status"> {{$file->description}} </p>
              <div class="fb-status-container fb-border">
                  <div class="fb-time-action">
                      <a href="#" onclick="event.preventDefault();likes({{$file->id}})"> Like</a>
                      <span>-</span>
                      <a href="#" onclick="event.preventDefault();comments({{$file->id}})"> Comments </a>
                      <span>-</span>
                      <a href="{{url('/subjects/'.$file->id.'/files/'.$file->id)}}"> Descargar </a>
                  </div>
              </div>
              <div class="fb-status-container fb-border fb-gray-bg">
                <div class="fb-time-action like-info">
                  <a class="font-weight-bold"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp;&nbsp;<span id='file-likes-{{$file->id}}'> {{$file->likes}} </span> personas les gusta esto</a>
                </div>
                <ul class="fb-comments d-none" id="file-comments-{{$file->id}}">

                  @foreach ($file->comments as $comment)

                  <li>
                    <a href="#" class="cmt-thumb">
                      <img src="{{url('/images/usuario.png')}}" alt="">
                    </a>
                    <div class="cmt-details">
                      <a href="#">{{$comment->user->name}}</a>
                      <span> {{$comment->description}}</span>
                      <p>{{$comment->created_at}}</p>
                    </div>
                  </li>

                  @endforeach

                  <li id='file-{{$file->id}}'>
                    <a href="#" class="cmt-thumb">
                      <img src="{{url('/images/usuario.png')}}" alt="">
                    </a>

                    <div class="cmt-form">

                      @if(count( $errors ) > 0)
                      @foreach ($errors->all() as $error)
                      <div>{{ $error }}</div>
                      @endforeach
                      @endif

                      <meta name="csrf-token" content="{{ csrf_token() }}">
                      {{ Form::open(array('route' => array('files.comments.store', $file->id), 'id'=>'comment-form')) }}
                      {{ Form::hidden('file_id', $file->id, array('id' => 'comment-file', 'disabled' => 'disabled')) }}
                      {{ Form::hidden('user', Auth::user()->name , array('id' => 'comment-user', 'disabled' => 'disabled')) }}
                      {{ Form::textarea('description', Input::old('description'), array('placeholder'=>'Deja tu comentario', 'class' => 'form-control', 'required' => 'required', 'id' => 'description-'.$file->id)) }}
                      {{ Form::submit('Comentar', array('class' => 'main-button icon-button pull-right')) }}
                      {{ Form::close() }}

                    </div>
                  </li>
                  
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          @endforeach 
          <div class="col-lg-6 col-lg-offset-5"> {{$files->render()}} </div>
        </div>          
    </div>
</div>

@endsection

