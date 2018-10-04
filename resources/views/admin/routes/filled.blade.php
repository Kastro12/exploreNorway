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

    @if(!empty(session('success')))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('success') }}
        </div>
    @endif

            <div class="col-sm-12">

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
                    @foreach($routes as $route)
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

                <table>
                    <tr><th>Plan</th></tr>
                    <tr><td>{!! $route->route !!}</td></tr>

                </table>
                <br/>
                <!-- EDIT -->
                <div class="row">

                    <div class="col-sm-1">
                        <a href="{{route('routeEdit',['id'=>$route->id])}}">
                            <button class="btn btn-dark">Edit</button>
                        </a>
                    </div>


                    <div class="col-sm-1">
    <!-- FORM FOR LOCK -->
        {!! Form::open(['action'=>['Admin\RoutesController@lock',$route->id],
        'method'=>'POST','enctype'=>'multipart/form-data']) !!}

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Unlock ',['class'=>'btn btn-success'])}}

        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-1">
        <!-- FORM FOR DELETE -->
        {!! Form::open(['action'=>['Admin\RoutesController@destroy',$route->id],
        'method'=>'POST','enctype'=>'multipart/form-data']) !!}

        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

        {!! Form::close() !!}
                    </div>

                </div>
                @endforeach
                {{$routes->links()}}

            </div>
        </div>
    </div>



@endsection