@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('routes')}}">
                <button class="btn btn-light" style="margin-right: 20px">User's wishes</button>
            </a>
        </li>
        <li>
            <a href="{{route('current')}}">
                <button class="btn btn-light" style="margin-right: 20px">Created routes</button>
            </a>
        </li>
        <li>
            <a href="{{route('filled')}}">
                <button class="btn btn-light" style="margin-right: 20px">Locked routes</button>
            </a>
        </li>
        <li>
            <a href="{{route('admincreateroute')}}">
                <button class="send btn" style="margin-right: 20px">Create route</button>
            </a>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

      {!! Form::open(['action'=>'Admin\RoutesController@store',
      'method'=>'POST','enctype'=>'multipart/form_data']) !!}

        {{Form::label('name','Name of route')}}
        {{Form::text('name','',['class'=>'form-control','required'])}}
<br/>
        {{Form::label('min_guests','Min number of people')}}
        {{Form::number('min_guests','',['class'=>'form-control','required'])}}
<br/>
        {{Form::label('max_guests','Max number of people')}}
        {{Form::number('max_guests','',['class'=>'form-control','required'])}}
<br/>
        {{Form::label('arrival','Arrival')}}
        {{Form::text('arrival','',['class'=>'form-control','id'=>'arrivalA','required','readonly'])}}
<br/>
        {{Form::label('departure','Departure')}}
        {{Form::text('departure','',['class'=>'form-control','id'=>'departureA','required','readonly'])}}
<br/>
        {{Form::label('price','Price')}}
        {{Form::number('price','',['class'=>'form-control','required'])}}
<br/>
        {{Form::label('route', 'Route')}}
        {{Form::textarea('route','',['id'=>'article-ckeditor','class' => 'form-control',
         'placeholder' => 'Plan','required'])}}
<br/>
                {{Form::submit('Create Route',['class'=>' send btn btn-lg'])}}

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>


@endsection