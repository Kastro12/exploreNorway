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
                <button class="btn btn-dark" style="margin-right: 20px">Locked route</button>
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

            <!-- SHOW ROUTE INFO -->
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Min guests</th>
                    <th>Max guests</th>
                    <th>Price</th>
                </tr>
                    <tr>
                        <td>{{$route->name}}</td>
                        <td>{{$route->created_at}}</td>
                        <td>{{$route->arrival}}</td>
                        <td>{{$route->departure}}</td>
                        <td>{{$route->min_guests}}</td>
                        <td>{{$route->max_guests}}</td>
                        <td>{{$route->price}}</td>
                    </tr>
            </table>

            <!-- FORM EDIT ROUTE -->
        {!! Form::open(['action'=>['Admin\RoutesController@update',$route->id],
        'method'=>'POST','enctype'=>'multipart/form-data']) !!}

            <!-- NAME -->
    <div class="row">
        <div class="col-sm-2">
            {{Form::label('name','Name')}}
        </div>
        <div class="col-sm-3">
            {{Form::text('name',$route->name,['class'=>'form-control'])}}
        </div>
    </div>
            <!-- ARRIVAL -->
    <div class="row">
        <div class="col-sm-2">
        {{Form::label('arrival','Arrival')}}
        </div>
        <div class="col-sm-3">
        {{Form::text('arrival',$route->arrival,['class'=>'form-control','id'=>'arrivalA','required','readonly'])}}
        </div>
    </div>
    <!-- DEPARTURE -->
    <div class="row">
        <div class="col-sm-2">
            {{Form::label('departure','Departure')}}
        </div>
        <div class="col-sm-3">
            {{Form::text('departure',$route->departure,['class'=>'form-control','id'=>'departureA','required','readonly'])}}
        </div>
    </div>
    <!-- MIN GUESTS -->
    <div class="row">
        <div class="col-sm-2">
            {{Form::label('min_guests','Min guests')}}
        </div>
        <div class="col-sm-3">
            {{Form::number('min_guests',$route->min_guests,['class'=>'form-control','required'])}}
        </div>
    </div>
    <!-- MAX GUESTS -->
    <div class="row">
        <div class="col-sm-2">
            {{Form::label('max_guests','Max guests')}}
        </div>
        <div class="col-sm-3">
            {{Form::number('max_guests',$route->max_guests,['class'=>'form-control','required'])}}
        </div>
    </div>
    <!-- PRICE -->
    <div class="row">
        <div class="col-sm-2">
            {{Form::label('price','Price')}}
        </div>
        <div class="col-sm-3">
            {{Form::number('price',$route->price,['class'=>'form-control','required'])}}
        </div>
    </div>
    <br/>
    {{Form::label('route', 'Plan')}}
    {{Form::textarea('route',$route->route,['id'=>'article-ckeditor','class' => 'form-control',
     'placeholder' => 'Plan','required'])}}

<br/>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>' send btn btn-lg'])}}

            {!! Form::close() !!}

        </div>
    </div>
</div>


    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>


@endsection