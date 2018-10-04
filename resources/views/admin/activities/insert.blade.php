@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('activities')}}">
                <button class="btn btn-light" style="margin-right: 20px"><b>All Activities</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('activitiesInsert')}}">
                <button class="send btn" style="margin-right: 20px">Insert new activity</button>
            </a>
        </li>


    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-8">

    {!! Form::open(['action'=>'Admin\ActivitiesController@insert',
    'method'=>'POST','enctype'=>'multipart\form-data']) !!}
<div class="row">
    <div class="col-sm-3">
        {{Form::label('name','Activity')}}
    </div>
    <div class="col-sm-6">
        {{Form::text('name','',['class'=>'form-control','required'])}}
    </div>
</div><br/><br/>
<div class="row">
    <div class="col-sm-3">
        {{Form::label('image','Enter the name of the image(Look at the gallery)')}}
    </div>
    <div class="col-sm-6">

        {{Form::text('image','',['class'=>'form-control','required'])}}
<br/><br/>
        {{Form::submit('insert',['class'=>'send btn btn-lg'])}}

    </div>
</div>
      {!! Form::close() !!}

            </div>
        </div>
    </div>



@endsection