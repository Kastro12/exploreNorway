@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('activities')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>All Activities</b></button>
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
            <div class="col-sm-12">

    @if(!empty(session('success')))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
    <tr>
    <th>Created at</th>
    <th>Activity</th>
    <th>Status</th>
    <th>Image</th>
    <th>Confirm</th>

    <th>Delete</th>
    </tr>
    @foreach($activities as $activity)

    <tr>
    <td>{{$activity->created_at}}</td>
    <td>{{$activity->name}}</td>
    <td>{{$activity->status}}</td>
    <td style="width: 200px">
      <img src="../images/gallery/{{$activity->image}}" class="slika"/>

    </td>

    <td>
        @if($activity->status === 0)

    {!! Form::open(['action'=> ['Admin\ActivitiesController@update',$activity->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Confirm',['class'=>'btn btn-light'])}}
    {!! Form::close() !!}
       @else
        {!! Form::open(['action'=> ['Admin\ActivitiesController@update',$activity->id],
        'method'=>'POST','enctype'=>'multipart\form_data']) !!}
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Unconfirm',['class'=>'btn btn-dark'])}}
        {!! Form::close() !!}
        @endif
    </td>

    <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=> ['Admin\ActivitiesController@destroy',$activity->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
    <td>
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}
    </td>
    {!! Form::close() !!}
    </tr>

    @endforeach
    </table>
    {{$activities->links()}}

            </div>
        </div>
    </div>



@endsection